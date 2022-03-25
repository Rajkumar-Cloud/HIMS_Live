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
$ivf_stimulation_chart_list = new ivf_stimulation_chart_list();

// Run the page
$ivf_stimulation_chart_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_stimulation_chartlist = currentForm = new ew.Form("fivf_stimulation_chartlist", "list");
fivf_stimulation_chartlist.formKeyCountName = '<?php echo $ivf_stimulation_chart_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_stimulation_chartlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_chartlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_stimulation_chartlist.lists["x_ARTCycle"] = <?php echo $ivf_stimulation_chart_list->ARTCycle->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_FemaleFactor"] = <?php echo $ivf_stimulation_chart_list->FemaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_FemaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->FemaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_MaleFactor"] = <?php echo $ivf_stimulation_chart_list->MaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_MaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->MaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_Protocol"] = <?php echo $ivf_stimulation_chart_list->Protocol->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Protocol->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_SemenFrozen"] = <?php echo $ivf_stimulation_chart_list->SemenFrozen->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_SemenFrozen"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->SemenFrozen->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_A4ICSICycle"] = <?php echo $ivf_stimulation_chart_list->A4ICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_A4ICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->A4ICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_TotalICSICycle"] = <?php echo $ivf_stimulation_chart_list->TotalICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TotalICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TotalICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_TypeOfInfertility"] = <?php echo $ivf_stimulation_chart_list->TypeOfInfertility->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TypeOfInfertility"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TypeOfInfertility->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_INJTYPE"] = <?php echo $ivf_stimulation_chart_list->INJTYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_INJTYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->INJTYPE->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_ANTAGONISTSTARTDAY"] = <?php echo $ivf_stimulation_chart_list->ANTAGONISTSTARTDAY->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ANTAGONISTSTARTDAY"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ANTAGONISTSTARTDAY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_PRETREATMENT"] = <?php echo $ivf_stimulation_chart_list->PRETREATMENT->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_PRETREATMENT"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->PRETREATMENT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_MedicalFactors"] = <?php echo $ivf_stimulation_chart_list->MedicalFactors->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_MedicalFactors"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->MedicalFactors->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_TRIGGERR"] = <?php echo $ivf_stimulation_chart_list->TRIGGERR->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TRIGGERR"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TRIGGERR->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_ATHOMEorCLINIC"] = <?php echo $ivf_stimulation_chart_list->ATHOMEorCLINIC->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ATHOMEorCLINIC"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ATHOMEorCLINIC->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_ALLFREEZEINDICATION"] = <?php echo $ivf_stimulation_chart_list->ALLFREEZEINDICATION->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ALLFREEZEINDICATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ALLFREEZEINDICATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_ERA"] = <?php echo $ivf_stimulation_chart_list->ERA->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ERA"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ERA->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_ET"] = <?php echo $ivf_stimulation_chart_list->ET->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ET"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_SEMENPREPARATION"] = <?php echo $ivf_stimulation_chart_list->SEMENPREPARATION->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_SEMENPREPARATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->SEMENPREPARATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_REASONFORESET"] = <?php echo $ivf_stimulation_chart_list->REASONFORESET->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_REASONFORESET"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->REASONFORESET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_Tablet1"] = <?php echo $ivf_stimulation_chart_list->Tablet1->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet1"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet1->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet2"] = <?php echo $ivf_stimulation_chart_list->Tablet2->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet2"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet2->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet3"] = <?php echo $ivf_stimulation_chart_list->Tablet3->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet3"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet3->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet4"] = <?php echo $ivf_stimulation_chart_list->Tablet4->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet4"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet4->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet5"] = <?php echo $ivf_stimulation_chart_list->Tablet5->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet5"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet5->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet6"] = <?php echo $ivf_stimulation_chart_list->Tablet6->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet6"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet6->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet7"] = <?php echo $ivf_stimulation_chart_list->Tablet7->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet7"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet7->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet8"] = <?php echo $ivf_stimulation_chart_list->Tablet8->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet8"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet8->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet9"] = <?php echo $ivf_stimulation_chart_list->Tablet9->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet9"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet9->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet10"] = <?php echo $ivf_stimulation_chart_list->Tablet10->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet10"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet10->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet11"] = <?php echo $ivf_stimulation_chart_list->Tablet11->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet11"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet11->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet12"] = <?php echo $ivf_stimulation_chart_list->Tablet12->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet12"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet12->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet13"] = <?php echo $ivf_stimulation_chart_list->Tablet13->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet13"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet13->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH1"] = <?php echo $ivf_stimulation_chart_list->RFSH1->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH1->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH2"] = <?php echo $ivf_stimulation_chart_list->RFSH2->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH2->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH3"] = <?php echo $ivf_stimulation_chart_list->RFSH3->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH3->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH4"] = <?php echo $ivf_stimulation_chart_list->RFSH4->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH4->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH5"] = <?php echo $ivf_stimulation_chart_list->RFSH5->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH5->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH6"] = <?php echo $ivf_stimulation_chart_list->RFSH6->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH6->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH7"] = <?php echo $ivf_stimulation_chart_list->RFSH7->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH7->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH8"] = <?php echo $ivf_stimulation_chart_list->RFSH8->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH8->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH9"] = <?php echo $ivf_stimulation_chart_list->RFSH9->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH9->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH10"] = <?php echo $ivf_stimulation_chart_list->RFSH10->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH10->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH11"] = <?php echo $ivf_stimulation_chart_list->RFSH11->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH11->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH12"] = <?php echo $ivf_stimulation_chart_list->RFSH12->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH12->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH13"] = <?php echo $ivf_stimulation_chart_list->RFSH13->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH13->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG1"] = <?php echo $ivf_stimulation_chart_list->HMG1->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG1"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG1->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG2"] = <?php echo $ivf_stimulation_chart_list->HMG2->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG2"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG2->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG3"] = <?php echo $ivf_stimulation_chart_list->HMG3->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG3"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG3->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG4"] = <?php echo $ivf_stimulation_chart_list->HMG4->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG4"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG4->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG5"] = <?php echo $ivf_stimulation_chart_list->HMG5->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG5"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG5->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG6"] = <?php echo $ivf_stimulation_chart_list->HMG6->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG6"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG6->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG7"] = <?php echo $ivf_stimulation_chart_list->HMG7->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG7"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG7->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG8"] = <?php echo $ivf_stimulation_chart_list->HMG8->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG8"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG8->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG9"] = <?php echo $ivf_stimulation_chart_list->HMG9->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG9"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG9->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG10"] = <?php echo $ivf_stimulation_chart_list->HMG10->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG10"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG10->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG11"] = <?php echo $ivf_stimulation_chart_list->HMG11->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG11"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG11->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG12"] = <?php echo $ivf_stimulation_chart_list->HMG12->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG12"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG12->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG13"] = <?php echo $ivf_stimulation_chart_list->HMG13->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG13"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG13->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH1"] = <?php echo $ivf_stimulation_chart_list->GnRH1->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH1->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH2"] = <?php echo $ivf_stimulation_chart_list->GnRH2->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH2->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH3"] = <?php echo $ivf_stimulation_chart_list->GnRH3->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH3->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH4"] = <?php echo $ivf_stimulation_chart_list->GnRH4->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH4->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH5"] = <?php echo $ivf_stimulation_chart_list->GnRH5->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH5->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH6"] = <?php echo $ivf_stimulation_chart_list->GnRH6->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH6->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH7"] = <?php echo $ivf_stimulation_chart_list->GnRH7->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH7->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH8"] = <?php echo $ivf_stimulation_chart_list->GnRH8->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH8->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH9"] = <?php echo $ivf_stimulation_chart_list->GnRH9->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH9->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH10"] = <?php echo $ivf_stimulation_chart_list->GnRH10->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH10->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH11"] = <?php echo $ivf_stimulation_chart_list->GnRH11->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH11->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH12"] = <?php echo $ivf_stimulation_chart_list->GnRH12->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH12->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH13"] = <?php echo $ivf_stimulation_chart_list->GnRH13->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH13->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Convert[]"] = <?php echo $ivf_stimulation_chart_list->Convert->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Convert[]"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Convert->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_InseminatinTechnique"] = <?php echo $ivf_stimulation_chart_list->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_IndicationForART"] = <?php echo $ivf_stimulation_chart_list->IndicationForART->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_IndicationForART"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->IndicationForART->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_Hysteroscopy"] = <?php echo $ivf_stimulation_chart_list->Hysteroscopy->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_EndometrialScratching"] = <?php echo $ivf_stimulation_chart_list->EndometrialScratching->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_TrialCannulation"] = <?php echo $ivf_stimulation_chart_list->TrialCannulation->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_CYCLETYPE"] = <?php echo $ivf_stimulation_chart_list->CYCLETYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_OralEstrogenDosage"] = <?php echo $ivf_stimulation_chart_list->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_GCSF"] = <?php echo $ivf_stimulation_chart_list->GCSF->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GCSF->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_ActivatedPRP"] = <?php echo $ivf_stimulation_chart_list->ActivatedPRP->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_AllFreeze"] = <?php echo $ivf_stimulation_chart_list->AllFreeze->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_AllFreeze"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->AllFreeze->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_TreatmentCancel"] = <?php echo $ivf_stimulation_chart_list->TreatmentCancel->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TreatmentCancel"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TreatmentCancel->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_Tablet14"] = <?php echo $ivf_stimulation_chart_list->Tablet14->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet14"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet14->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet15"] = <?php echo $ivf_stimulation_chart_list->Tablet15->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet15"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet15->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet16"] = <?php echo $ivf_stimulation_chart_list->Tablet16->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet16"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet16->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet17"] = <?php echo $ivf_stimulation_chart_list->Tablet17->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet17"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet17->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet18"] = <?php echo $ivf_stimulation_chart_list->Tablet18->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet18"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet18->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet19"] = <?php echo $ivf_stimulation_chart_list->Tablet19->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet19"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet19->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet20"] = <?php echo $ivf_stimulation_chart_list->Tablet20->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet20"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet20->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet21"] = <?php echo $ivf_stimulation_chart_list->Tablet21->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet21"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet21->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet22"] = <?php echo $ivf_stimulation_chart_list->Tablet22->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet22"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet22->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet23"] = <?php echo $ivf_stimulation_chart_list->Tablet23->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet23"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet23->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet24"] = <?php echo $ivf_stimulation_chart_list->Tablet24->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet24"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet24->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_Tablet25"] = <?php echo $ivf_stimulation_chart_list->Tablet25->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_Tablet25"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->Tablet25->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH14"] = <?php echo $ivf_stimulation_chart_list->RFSH14->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH14->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH15"] = <?php echo $ivf_stimulation_chart_list->RFSH15->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH15->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH16"] = <?php echo $ivf_stimulation_chart_list->RFSH16->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH16->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH17"] = <?php echo $ivf_stimulation_chart_list->RFSH17->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH17->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH18"] = <?php echo $ivf_stimulation_chart_list->RFSH18->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH18->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH19"] = <?php echo $ivf_stimulation_chart_list->RFSH19->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH19->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH20"] = <?php echo $ivf_stimulation_chart_list->RFSH20->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH20->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH21"] = <?php echo $ivf_stimulation_chart_list->RFSH21->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH21->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH22"] = <?php echo $ivf_stimulation_chart_list->RFSH22->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH22->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH23"] = <?php echo $ivf_stimulation_chart_list->RFSH23->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH23->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH24"] = <?php echo $ivf_stimulation_chart_list->RFSH24->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH24->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_RFSH25"] = <?php echo $ivf_stimulation_chart_list->RFSH25->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_RFSH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->RFSH25->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG14"] = <?php echo $ivf_stimulation_chart_list->HMG14->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG14"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG14->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG15"] = <?php echo $ivf_stimulation_chart_list->HMG15->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG15"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG15->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG16"] = <?php echo $ivf_stimulation_chart_list->HMG16->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG16"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG16->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG17"] = <?php echo $ivf_stimulation_chart_list->HMG17->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG17"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG17->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG18"] = <?php echo $ivf_stimulation_chart_list->HMG18->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG18"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG18->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG19"] = <?php echo $ivf_stimulation_chart_list->HMG19->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG19"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG19->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG20"] = <?php echo $ivf_stimulation_chart_list->HMG20->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG20"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG20->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG21"] = <?php echo $ivf_stimulation_chart_list->HMG21->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG21"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG21->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG22"] = <?php echo $ivf_stimulation_chart_list->HMG22->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG22"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG22->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG23"] = <?php echo $ivf_stimulation_chart_list->HMG23->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG23"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG23->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG24"] = <?php echo $ivf_stimulation_chart_list->HMG24->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG24"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG24->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_HMG25"] = <?php echo $ivf_stimulation_chart_list->HMG25->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HMG25"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HMG25->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH14"] = <?php echo $ivf_stimulation_chart_list->GnRH14->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH14->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH15"] = <?php echo $ivf_stimulation_chart_list->GnRH15->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH15->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH16"] = <?php echo $ivf_stimulation_chart_list->GnRH16->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH16->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH17"] = <?php echo $ivf_stimulation_chart_list->GnRH17->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH17->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH18"] = <?php echo $ivf_stimulation_chart_list->GnRH18->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH18->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH19"] = <?php echo $ivf_stimulation_chart_list->GnRH19->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH19->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH20"] = <?php echo $ivf_stimulation_chart_list->GnRH20->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH20->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH21"] = <?php echo $ivf_stimulation_chart_list->GnRH21->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH21->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH22"] = <?php echo $ivf_stimulation_chart_list->GnRH22->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH22->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH23"] = <?php echo $ivf_stimulation_chart_list->GnRH23->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH23->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH24"] = <?php echo $ivf_stimulation_chart_list->GnRH24->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH24->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_GnRH25"] = <?php echo $ivf_stimulation_chart_list->GnRH25->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_GnRH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->GnRH25->lookupOptions()) ?>;
fivf_stimulation_chartlist.lists["x_TUBAL_PATENCY"] = <?php echo $ivf_stimulation_chart_list->TUBAL_PATENCY->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_TUBAL_PATENCY"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->TUBAL_PATENCY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_HSG"] = <?php echo $ivf_stimulation_chart_list->HSG->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_HSG"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->HSG->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_DHL"] = <?php echo $ivf_stimulation_chart_list->DHL->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_DHL"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->DHL->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_UTERINE_PROBLEMS"] = <?php echo $ivf_stimulation_chart_list->UTERINE_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_UTERINE_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->UTERINE_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_W_COMORBIDS"] = <?php echo $ivf_stimulation_chart_list->W_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_W_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->W_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_H_COMORBIDS"] = <?php echo $ivf_stimulation_chart_list->H_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_H_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->H_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_SEXUAL_DYSFUNCTION"] = <?php echo $ivf_stimulation_chart_list->SEXUAL_DYSFUNCTION->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_SEXUAL_DYSFUNCTION"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->SEXUAL_DYSFUNCTION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_FOLLICLE_STATUS"] = <?php echo $ivf_stimulation_chart_list->FOLLICLE_STATUS->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_FOLLICLE_STATUS"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->FOLLICLE_STATUS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_NUMBER_OF_IUI"] = <?php echo $ivf_stimulation_chart_list->NUMBER_OF_IUI->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_NUMBER_OF_IUI"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->NUMBER_OF_IUI->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_PROCEDURE"] = <?php echo $ivf_stimulation_chart_list->PROCEDURE->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_PROCEDURE"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->PROCEDURE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_LUTEAL_SUPPORT"] = <?php echo $ivf_stimulation_chart_list->LUTEAL_SUPPORT->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_LUTEAL_SUPPORT"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->LUTEAL_SUPPORT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartlist.lists["x_SPECIFIC_MATERNAL_PROBLEMS"] = <?php echo $ivf_stimulation_chart_list->SPECIFIC_MATERNAL_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartlist.lists["x_SPECIFIC_MATERNAL_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_list->SPECIFIC_MATERNAL_PROBLEMS->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_stimulation_chartlistsrch = currentSearchForm = new ew.Form("fivf_stimulation_chartlistsrch");

// Filters
fivf_stimulation_chartlistsrch.filterList = <?php echo $ivf_stimulation_chart_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_stimulation_chart_list->TotalRecs > 0 && $ivf_stimulation_chart_list->ExportOptions->visible()) { ?>
<?php $ivf_stimulation_chart_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->ImportOptions->visible()) { ?>
<?php $ivf_stimulation_chart_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->SearchOptions->visible()) { ?>
<?php $ivf_stimulation_chart_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->FilterOptions->visible()) { ?>
<?php $ivf_stimulation_chart_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_stimulation_chart->isExport() || EXPORT_MASTER_RECORD && $ivf_stimulation_chart->isExport("print")) { ?>
<?php
if ($ivf_stimulation_chart_list->DbMasterFilter <> "" && $ivf_stimulation_chart->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_stimulation_chart_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_stimulation_chart_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_stimulation_chart->isExport() && !$ivf_stimulation_chart->CurrentAction) { ?>
<form name="fivf_stimulation_chartlistsrch" id="fivf_stimulation_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_stimulation_chart_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_stimulation_chartlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_stimulation_chart">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_stimulation_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_stimulation_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_stimulation_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_stimulation_chart_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_chart_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_chart_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_chart_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_stimulation_chart_list->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_list->showMessage();
?>
<?php if ($ivf_stimulation_chart_list->TotalRecs > 0 || $ivf_stimulation_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_stimulation_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_stimulation_chart">
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_stimulation_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_stimulation_chart_list->Pager)) $ivf_stimulation_chart_list->Pager = new NumericPager($ivf_stimulation_chart_list->StartRec, $ivf_stimulation_chart_list->DisplayRecs, $ivf_stimulation_chart_list->TotalRecs, $ivf_stimulation_chart_list->RecRange, $ivf_stimulation_chart_list->AutoHidePager) ?>
<?php if ($ivf_stimulation_chart_list->Pager->RecordCount > 0 && $ivf_stimulation_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_stimulation_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_stimulation_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_stimulation_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->TotalRecs > 0 && (!$ivf_stimulation_chart_list->AutoHidePageSizeSelector || $ivf_stimulation_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_stimulation_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_stimulation_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_stimulation_chartlist" id="fivf_stimulation_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_chart_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_chart_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<?php if ($ivf_stimulation_chart->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_stimulation_chart->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_stimulation_chart->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_stimulation_chart->Name->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $ivf_stimulation_chart->TidNo->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_stimulation_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_stimulation_chart_list->TotalRecs > 0 || $ivf_stimulation_chart->isGridEdit()) { ?>
<table id="tbl_ivf_stimulation_chartlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_stimulation_chart_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_stimulation_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_stimulation_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_stimulation_chart->id->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_stimulation_chart->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->id) ?>',1);"><div id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_stimulation_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_stimulation_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RIDNo) ?>',1);"><div id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_stimulation_chart->Name->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_stimulation_chart->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Name) ?>',1);"><div id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_stimulation_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_stimulation_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ARTCycle) ?>',1);"><div id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->FemaleFactor) == "") { ?>
		<th data-name="FemaleFactor" class="<?php echo $ivf_stimulation_chart->FemaleFactor->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleFactor" class="<?php echo $ivf_stimulation_chart->FemaleFactor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FemaleFactor) ?>',1);"><div id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->FemaleFactor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->FemaleFactor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->MaleFactor) == "") { ?>
		<th data-name="MaleFactor" class="<?php echo $ivf_stimulation_chart->MaleFactor->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleFactor" class="<?php echo $ivf_stimulation_chart->MaleFactor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MaleFactor) ?>',1);"><div id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->MaleFactor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->MaleFactor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Protocol) == "") { ?>
		<th data-name="Protocol" class="<?php echo $ivf_stimulation_chart->Protocol->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Protocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Protocol" class="<?php echo $ivf_stimulation_chart->Protocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Protocol) ?>',1);"><div id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Protocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Protocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SemenFrozen) == "") { ?>
		<th data-name="SemenFrozen" class="<?php echo $ivf_stimulation_chart->SemenFrozen->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SemenFrozen" class="<?php echo $ivf_stimulation_chart->SemenFrozen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SemenFrozen) ?>',1);"><div id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SemenFrozen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SemenFrozen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->A4ICSICycle) == "") { ?>
		<th data-name="A4ICSICycle" class="<?php echo $ivf_stimulation_chart->A4ICSICycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A4ICSICycle" class="<?php echo $ivf_stimulation_chart->A4ICSICycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->A4ICSICycle) ?>',1);"><div id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->A4ICSICycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->A4ICSICycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TotalICSICycle) == "") { ?>
		<th data-name="TotalICSICycle" class="<?php echo $ivf_stimulation_chart->TotalICSICycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalICSICycle" class="<?php echo $ivf_stimulation_chart->TotalICSICycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TotalICSICycle) ?>',1);"><div id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TotalICSICycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TotalICSICycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TypeOfInfertility) == "") { ?>
		<th data-name="TypeOfInfertility" class="<?php echo $ivf_stimulation_chart->TypeOfInfertility->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfInfertility" class="<?php echo $ivf_stimulation_chart->TypeOfInfertility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TypeOfInfertility) ?>',1);"><div id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TypeOfInfertility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TypeOfInfertility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $ivf_stimulation_chart->Duration->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $ivf_stimulation_chart->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Duration) ?>',1);"><div id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Duration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $ivf_stimulation_chart->LMP->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $ivf_stimulation_chart->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->LMP) ?>',1);"><div id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RelevantHistory) == "") { ?>
		<th data-name="RelevantHistory" class="<?php echo $ivf_stimulation_chart->RelevantHistory->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RelevantHistory" class="<?php echo $ivf_stimulation_chart->RelevantHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RelevantHistory) ?>',1);"><div id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RelevantHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RelevantHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->IUICycles) == "") { ?>
		<th data-name="IUICycles" class="<?php echo $ivf_stimulation_chart->IUICycles->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IUICycles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUICycles" class="<?php echo $ivf_stimulation_chart->IUICycles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->IUICycles) ?>',1);"><div id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IUICycles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->IUICycles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->IUICycles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->AFC) == "") { ?>
		<th data-name="AFC" class="<?php echo $ivf_stimulation_chart->AFC->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AFC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AFC" class="<?php echo $ivf_stimulation_chart->AFC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AFC) ?>',1);"><div id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AFC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->AFC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->AFC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->AMH) == "") { ?>
		<th data-name="AMH" class="<?php echo $ivf_stimulation_chart->AMH->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AMH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMH" class="<?php echo $ivf_stimulation_chart->AMH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AMH) ?>',1);"><div id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AMH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->AMH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->AMH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $ivf_stimulation_chart->FBMI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $ivf_stimulation_chart->FBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FBMI) ?>',1);"><div id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->FBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->FBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->MBMI) == "") { ?>
		<th data-name="MBMI" class="<?php echo $ivf_stimulation_chart->MBMI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBMI" class="<?php echo $ivf_stimulation_chart->MBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MBMI) ?>',1);"><div id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->MBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->MBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->OvarianVolumeRT) == "") { ?>
		<th data-name="OvarianVolumeRT" class="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OvarianVolumeRT" class="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianVolumeRT) ?>',1);"><div id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->OvarianVolumeRT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->OvarianVolumeRT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->OvarianVolumeLT) == "") { ?>
		<th data-name="OvarianVolumeLT" class="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OvarianVolumeLT" class="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianVolumeLT) ?>',1);"><div id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->OvarianVolumeLT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->OvarianVolumeLT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DAYSOFSTIMULATION) == "") { ?>
		<th data-name="DAYSOFSTIMULATION" class="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYSOFSTIMULATION" class="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYSOFSTIMULATION) ?>',1);"><div id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DAYSOFSTIMULATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DOSEOFGONADOTROPINS) == "") { ?>
		<th data-name="DOSEOFGONADOTROPINS" class="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DOSEOFGONADOTROPINS" class="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DOSEOFGONADOTROPINS) ?>',1);"><div id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->INJTYPE) == "") { ?>
		<th data-name="INJTYPE" class="<?php echo $ivf_stimulation_chart->INJTYPE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJTYPE" class="<?php echo $ivf_stimulation_chart->INJTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->INJTYPE) ?>',1);"><div id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->INJTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->INJTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ANTAGONISTDAYS) == "") { ?>
		<th data-name="ANTAGONISTDAYS" class="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANTAGONISTDAYS" class="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ANTAGONISTDAYS) ?>',1);"><div id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ANTAGONISTDAYS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ANTAGONISTSTARTDAY) == "") { ?>
		<th data-name="ANTAGONISTSTARTDAY" class="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANTAGONISTSTARTDAY" class="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ANTAGONISTSTARTDAY) ?>',1);"><div id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GROWTHHORMONE) == "") { ?>
		<th data-name="GROWTHHORMONE" class="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GROWTHHORMONE" class="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GROWTHHORMONE) ?>',1);"><div id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GROWTHHORMONE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GROWTHHORMONE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->PRETREATMENT) == "") { ?>
		<th data-name="PRETREATMENT" class="<?php echo $ivf_stimulation_chart->PRETREATMENT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRETREATMENT" class="<?php echo $ivf_stimulation_chart->PRETREATMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PRETREATMENT) ?>',1);"><div id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->PRETREATMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->PRETREATMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SerumP4) == "") { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_stimulation_chart->SerumP4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SerumP4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_stimulation_chart->SerumP4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SerumP4) ?>',1);"><div id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SerumP4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SerumP4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SerumP4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->FORT) == "") { ?>
		<th data-name="FORT" class="<?php echo $ivf_stimulation_chart->FORT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORT" class="<?php echo $ivf_stimulation_chart->FORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FORT) ?>',1);"><div id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->FORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->FORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->MedicalFactors) == "") { ?>
		<th data-name="MedicalFactors" class="<?php echo $ivf_stimulation_chart->MedicalFactors->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MedicalFactors" class="<?php echo $ivf_stimulation_chart->MedicalFactors->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->MedicalFactors) ?>',1);"><div id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->MedicalFactors->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->MedicalFactors->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SCDate) == "") { ?>
		<th data-name="SCDate" class="<?php echo $ivf_stimulation_chart->SCDate->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SCDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCDate" class="<?php echo $ivf_stimulation_chart->SCDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SCDate) ?>',1);"><div id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SCDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SCDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SCDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->OvarianSurgery) == "") { ?>
		<th data-name="OvarianSurgery" class="<?php echo $ivf_stimulation_chart->OvarianSurgery->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OvarianSurgery" class="<?php echo $ivf_stimulation_chart->OvarianSurgery->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OvarianSurgery) ?>',1);"><div id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->OvarianSurgery->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->OvarianSurgery->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->PreProcedureOrder) == "") { ?>
		<th data-name="PreProcedureOrder" class="<?php echo $ivf_stimulation_chart->PreProcedureOrder->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreProcedureOrder" class="<?php echo $ivf_stimulation_chart->PreProcedureOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PreProcedureOrder) ?>',1);"><div id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->PreProcedureOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->PreProcedureOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TRIGGERR) == "") { ?>
		<th data-name="TRIGGERR" class="<?php echo $ivf_stimulation_chart->TRIGGERR->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TRIGGERR" class="<?php echo $ivf_stimulation_chart->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TRIGGERR) ?>',1);"><div id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TRIGGERR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TRIGGERR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TRIGGERDATE) == "") { ?>
		<th data-name="TRIGGERDATE" class="<?php echo $ivf_stimulation_chart->TRIGGERDATE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TRIGGERDATE" class="<?php echo $ivf_stimulation_chart->TRIGGERDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TRIGGERDATE) ?>',1);"><div id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TRIGGERDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TRIGGERDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ATHOMEorCLINIC) == "") { ?>
		<th data-name="ATHOMEorCLINIC" class="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ATHOMEorCLINIC" class="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ATHOMEorCLINIC) ?>',1);"><div id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ATHOMEorCLINIC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->OPUDATE) == "") { ?>
		<th data-name="OPUDATE" class="<?php echo $ivf_stimulation_chart->OPUDATE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDATE" class="<?php echo $ivf_stimulation_chart->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OPUDATE) ?>',1);"><div id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->OPUDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->OPUDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ALLFREEZEINDICATION) == "") { ?>
		<th data-name="ALLFREEZEINDICATION" class="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ALLFREEZEINDICATION" class="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ALLFREEZEINDICATION) ?>',1);"><div id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ALLFREEZEINDICATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ERA) == "") { ?>
		<th data-name="ERA" class="<?php echo $ivf_stimulation_chart->ERA->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ERA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ERA" class="<?php echo $ivf_stimulation_chart->ERA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ERA) ?>',1);"><div id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ERA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ERA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->PGTA) == "") { ?>
		<th data-name="PGTA" class="<?php echo $ivf_stimulation_chart->PGTA->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGTA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGTA" class="<?php echo $ivf_stimulation_chart->PGTA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PGTA) ?>',1);"><div id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGTA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->PGTA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->PGTA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->PGD) == "") { ?>
		<th data-name="PGD" class="<?php echo $ivf_stimulation_chart->PGD->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGD" class="<?php echo $ivf_stimulation_chart->PGD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PGD) ?>',1);"><div id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PGD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->PGD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->PGD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DATEOFET) == "") { ?>
		<th data-name="DATEOFET" class="<?php echo $ivf_stimulation_chart->DATEOFET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFET" class="<?php echo $ivf_stimulation_chart->DATEOFET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DATEOFET) ?>',1);"><div id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DATEOFET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DATEOFET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ET) == "") { ?>
		<th data-name="ET" class="<?php echo $ivf_stimulation_chart->ET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ET" class="<?php echo $ivf_stimulation_chart->ET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ET) ?>',1);"><div id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ESET) == "") { ?>
		<th data-name="ESET" class="<?php echo $ivf_stimulation_chart->ESET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ESET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ESET" class="<?php echo $ivf_stimulation_chart->ESET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ESET) ?>',1);"><div id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ESET->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ESET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ESET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DOET) == "") { ?>
		<th data-name="DOET" class="<?php echo $ivf_stimulation_chart->DOET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DOET" class="<?php echo $ivf_stimulation_chart->DOET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DOET) ?>',1);"><div id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DOET->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DOET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DOET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SEMENPREPARATION) == "") { ?>
		<th data-name="SEMENPREPARATION" class="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEMENPREPARATION" class="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SEMENPREPARATION) ?>',1);"><div id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SEMENPREPARATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SEMENPREPARATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->REASONFORESET) == "") { ?>
		<th data-name="REASONFORESET" class="<?php echo $ivf_stimulation_chart->REASONFORESET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REASONFORESET" class="<?php echo $ivf_stimulation_chart->REASONFORESET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->REASONFORESET) ?>',1);"><div id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->REASONFORESET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->REASONFORESET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Expectedoocytes) == "") { ?>
		<th data-name="Expectedoocytes" class="<?php echo $ivf_stimulation_chart->Expectedoocytes->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Expectedoocytes" class="<?php echo $ivf_stimulation_chart->Expectedoocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Expectedoocytes) ?>',1);"><div id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Expectedoocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Expectedoocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate1) == "") { ?>
		<th data-name="StChDate1" class="<?php echo $ivf_stimulation_chart->StChDate1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate1" class="<?php echo $ivf_stimulation_chart->StChDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate1) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate2) == "") { ?>
		<th data-name="StChDate2" class="<?php echo $ivf_stimulation_chart->StChDate2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate2" class="<?php echo $ivf_stimulation_chart->StChDate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate2) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate3) == "") { ?>
		<th data-name="StChDate3" class="<?php echo $ivf_stimulation_chart->StChDate3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate3" class="<?php echo $ivf_stimulation_chart->StChDate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate3) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate4) == "") { ?>
		<th data-name="StChDate4" class="<?php echo $ivf_stimulation_chart->StChDate4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate4" class="<?php echo $ivf_stimulation_chart->StChDate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate4) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate5) == "") { ?>
		<th data-name="StChDate5" class="<?php echo $ivf_stimulation_chart->StChDate5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate5" class="<?php echo $ivf_stimulation_chart->StChDate5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate5) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate6) == "") { ?>
		<th data-name="StChDate6" class="<?php echo $ivf_stimulation_chart->StChDate6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate6" class="<?php echo $ivf_stimulation_chart->StChDate6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate6) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate7) == "") { ?>
		<th data-name="StChDate7" class="<?php echo $ivf_stimulation_chart->StChDate7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate7" class="<?php echo $ivf_stimulation_chart->StChDate7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate7) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate8) == "") { ?>
		<th data-name="StChDate8" class="<?php echo $ivf_stimulation_chart->StChDate8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate8" class="<?php echo $ivf_stimulation_chart->StChDate8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate8) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate9) == "") { ?>
		<th data-name="StChDate9" class="<?php echo $ivf_stimulation_chart->StChDate9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate9" class="<?php echo $ivf_stimulation_chart->StChDate9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate9) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate10) == "") { ?>
		<th data-name="StChDate10" class="<?php echo $ivf_stimulation_chart->StChDate10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate10" class="<?php echo $ivf_stimulation_chart->StChDate10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate10) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate11) == "") { ?>
		<th data-name="StChDate11" class="<?php echo $ivf_stimulation_chart->StChDate11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate11" class="<?php echo $ivf_stimulation_chart->StChDate11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate11) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate12) == "") { ?>
		<th data-name="StChDate12" class="<?php echo $ivf_stimulation_chart->StChDate12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate12" class="<?php echo $ivf_stimulation_chart->StChDate12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate12) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate13) == "") { ?>
		<th data-name="StChDate13" class="<?php echo $ivf_stimulation_chart->StChDate13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate13" class="<?php echo $ivf_stimulation_chart->StChDate13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate13) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay1) == "") { ?>
		<th data-name="CycleDay1" class="<?php echo $ivf_stimulation_chart->CycleDay1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay1" class="<?php echo $ivf_stimulation_chart->CycleDay1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay1) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay2) == "") { ?>
		<th data-name="CycleDay2" class="<?php echo $ivf_stimulation_chart->CycleDay2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay2" class="<?php echo $ivf_stimulation_chart->CycleDay2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay2) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay3) == "") { ?>
		<th data-name="CycleDay3" class="<?php echo $ivf_stimulation_chart->CycleDay3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay3" class="<?php echo $ivf_stimulation_chart->CycleDay3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay3) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay4) == "") { ?>
		<th data-name="CycleDay4" class="<?php echo $ivf_stimulation_chart->CycleDay4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay4" class="<?php echo $ivf_stimulation_chart->CycleDay4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay4) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay5) == "") { ?>
		<th data-name="CycleDay5" class="<?php echo $ivf_stimulation_chart->CycleDay5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay5" class="<?php echo $ivf_stimulation_chart->CycleDay5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay5) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay6) == "") { ?>
		<th data-name="CycleDay6" class="<?php echo $ivf_stimulation_chart->CycleDay6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay6" class="<?php echo $ivf_stimulation_chart->CycleDay6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay6) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay7) == "") { ?>
		<th data-name="CycleDay7" class="<?php echo $ivf_stimulation_chart->CycleDay7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay7" class="<?php echo $ivf_stimulation_chart->CycleDay7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay7) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay8) == "") { ?>
		<th data-name="CycleDay8" class="<?php echo $ivf_stimulation_chart->CycleDay8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay8" class="<?php echo $ivf_stimulation_chart->CycleDay8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay8) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay9) == "") { ?>
		<th data-name="CycleDay9" class="<?php echo $ivf_stimulation_chart->CycleDay9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay9" class="<?php echo $ivf_stimulation_chart->CycleDay9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay9) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay10) == "") { ?>
		<th data-name="CycleDay10" class="<?php echo $ivf_stimulation_chart->CycleDay10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay10" class="<?php echo $ivf_stimulation_chart->CycleDay10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay10) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay11) == "") { ?>
		<th data-name="CycleDay11" class="<?php echo $ivf_stimulation_chart->CycleDay11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay11" class="<?php echo $ivf_stimulation_chart->CycleDay11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay11) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay12) == "") { ?>
		<th data-name="CycleDay12" class="<?php echo $ivf_stimulation_chart->CycleDay12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay12" class="<?php echo $ivf_stimulation_chart->CycleDay12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay12) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay13) == "") { ?>
		<th data-name="CycleDay13" class="<?php echo $ivf_stimulation_chart->CycleDay13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay13" class="<?php echo $ivf_stimulation_chart->CycleDay13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay13) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay1) == "") { ?>
		<th data-name="StimulationDay1" class="<?php echo $ivf_stimulation_chart->StimulationDay1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay1" class="<?php echo $ivf_stimulation_chart->StimulationDay1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay1) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay2) == "") { ?>
		<th data-name="StimulationDay2" class="<?php echo $ivf_stimulation_chart->StimulationDay2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay2" class="<?php echo $ivf_stimulation_chart->StimulationDay2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay2) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay3) == "") { ?>
		<th data-name="StimulationDay3" class="<?php echo $ivf_stimulation_chart->StimulationDay3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay3" class="<?php echo $ivf_stimulation_chart->StimulationDay3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay3) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay4) == "") { ?>
		<th data-name="StimulationDay4" class="<?php echo $ivf_stimulation_chart->StimulationDay4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay4" class="<?php echo $ivf_stimulation_chart->StimulationDay4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay4) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay5) == "") { ?>
		<th data-name="StimulationDay5" class="<?php echo $ivf_stimulation_chart->StimulationDay5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay5" class="<?php echo $ivf_stimulation_chart->StimulationDay5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay5) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay6) == "") { ?>
		<th data-name="StimulationDay6" class="<?php echo $ivf_stimulation_chart->StimulationDay6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay6" class="<?php echo $ivf_stimulation_chart->StimulationDay6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay6) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay7) == "") { ?>
		<th data-name="StimulationDay7" class="<?php echo $ivf_stimulation_chart->StimulationDay7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay7" class="<?php echo $ivf_stimulation_chart->StimulationDay7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay7) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay8) == "") { ?>
		<th data-name="StimulationDay8" class="<?php echo $ivf_stimulation_chart->StimulationDay8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay8" class="<?php echo $ivf_stimulation_chart->StimulationDay8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay8) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay9) == "") { ?>
		<th data-name="StimulationDay9" class="<?php echo $ivf_stimulation_chart->StimulationDay9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay9" class="<?php echo $ivf_stimulation_chart->StimulationDay9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay9) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay10) == "") { ?>
		<th data-name="StimulationDay10" class="<?php echo $ivf_stimulation_chart->StimulationDay10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay10" class="<?php echo $ivf_stimulation_chart->StimulationDay10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay10) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay11) == "") { ?>
		<th data-name="StimulationDay11" class="<?php echo $ivf_stimulation_chart->StimulationDay11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay11" class="<?php echo $ivf_stimulation_chart->StimulationDay11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay11) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay12) == "") { ?>
		<th data-name="StimulationDay12" class="<?php echo $ivf_stimulation_chart->StimulationDay12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay12" class="<?php echo $ivf_stimulation_chart->StimulationDay12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay12) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay13) == "") { ?>
		<th data-name="StimulationDay13" class="<?php echo $ivf_stimulation_chart->StimulationDay13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay13" class="<?php echo $ivf_stimulation_chart->StimulationDay13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay13) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet1) == "") { ?>
		<th data-name="Tablet1" class="<?php echo $ivf_stimulation_chart->Tablet1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet1" class="<?php echo $ivf_stimulation_chart->Tablet1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet1) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet2) == "") { ?>
		<th data-name="Tablet2" class="<?php echo $ivf_stimulation_chart->Tablet2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet2" class="<?php echo $ivf_stimulation_chart->Tablet2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet2) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet3) == "") { ?>
		<th data-name="Tablet3" class="<?php echo $ivf_stimulation_chart->Tablet3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet3" class="<?php echo $ivf_stimulation_chart->Tablet3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet3) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet4) == "") { ?>
		<th data-name="Tablet4" class="<?php echo $ivf_stimulation_chart->Tablet4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet4" class="<?php echo $ivf_stimulation_chart->Tablet4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet4) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet5) == "") { ?>
		<th data-name="Tablet5" class="<?php echo $ivf_stimulation_chart->Tablet5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet5" class="<?php echo $ivf_stimulation_chart->Tablet5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet5) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet6) == "") { ?>
		<th data-name="Tablet6" class="<?php echo $ivf_stimulation_chart->Tablet6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet6" class="<?php echo $ivf_stimulation_chart->Tablet6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet6) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet7) == "") { ?>
		<th data-name="Tablet7" class="<?php echo $ivf_stimulation_chart->Tablet7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet7" class="<?php echo $ivf_stimulation_chart->Tablet7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet7) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet8) == "") { ?>
		<th data-name="Tablet8" class="<?php echo $ivf_stimulation_chart->Tablet8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet8" class="<?php echo $ivf_stimulation_chart->Tablet8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet8) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet9) == "") { ?>
		<th data-name="Tablet9" class="<?php echo $ivf_stimulation_chart->Tablet9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet9" class="<?php echo $ivf_stimulation_chart->Tablet9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet9) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet10) == "") { ?>
		<th data-name="Tablet10" class="<?php echo $ivf_stimulation_chart->Tablet10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet10" class="<?php echo $ivf_stimulation_chart->Tablet10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet10) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet11) == "") { ?>
		<th data-name="Tablet11" class="<?php echo $ivf_stimulation_chart->Tablet11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet11" class="<?php echo $ivf_stimulation_chart->Tablet11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet11) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet12) == "") { ?>
		<th data-name="Tablet12" class="<?php echo $ivf_stimulation_chart->Tablet12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet12" class="<?php echo $ivf_stimulation_chart->Tablet12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet12) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet13) == "") { ?>
		<th data-name="Tablet13" class="<?php echo $ivf_stimulation_chart->Tablet13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet13" class="<?php echo $ivf_stimulation_chart->Tablet13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet13) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH1) == "") { ?>
		<th data-name="RFSH1" class="<?php echo $ivf_stimulation_chart->RFSH1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH1" class="<?php echo $ivf_stimulation_chart->RFSH1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH1) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH2) == "") { ?>
		<th data-name="RFSH2" class="<?php echo $ivf_stimulation_chart->RFSH2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH2" class="<?php echo $ivf_stimulation_chart->RFSH2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH2) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH3) == "") { ?>
		<th data-name="RFSH3" class="<?php echo $ivf_stimulation_chart->RFSH3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH3" class="<?php echo $ivf_stimulation_chart->RFSH3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH3) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH4) == "") { ?>
		<th data-name="RFSH4" class="<?php echo $ivf_stimulation_chart->RFSH4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH4" class="<?php echo $ivf_stimulation_chart->RFSH4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH4) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH5) == "") { ?>
		<th data-name="RFSH5" class="<?php echo $ivf_stimulation_chart->RFSH5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH5" class="<?php echo $ivf_stimulation_chart->RFSH5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH5) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH6) == "") { ?>
		<th data-name="RFSH6" class="<?php echo $ivf_stimulation_chart->RFSH6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH6" class="<?php echo $ivf_stimulation_chart->RFSH6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH6) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH7) == "") { ?>
		<th data-name="RFSH7" class="<?php echo $ivf_stimulation_chart->RFSH7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH7" class="<?php echo $ivf_stimulation_chart->RFSH7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH7) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH8) == "") { ?>
		<th data-name="RFSH8" class="<?php echo $ivf_stimulation_chart->RFSH8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH8" class="<?php echo $ivf_stimulation_chart->RFSH8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH8) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH9) == "") { ?>
		<th data-name="RFSH9" class="<?php echo $ivf_stimulation_chart->RFSH9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH9" class="<?php echo $ivf_stimulation_chart->RFSH9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH9) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH10) == "") { ?>
		<th data-name="RFSH10" class="<?php echo $ivf_stimulation_chart->RFSH10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH10" class="<?php echo $ivf_stimulation_chart->RFSH10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH10) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH11) == "") { ?>
		<th data-name="RFSH11" class="<?php echo $ivf_stimulation_chart->RFSH11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH11" class="<?php echo $ivf_stimulation_chart->RFSH11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH11) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH12) == "") { ?>
		<th data-name="RFSH12" class="<?php echo $ivf_stimulation_chart->RFSH12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH12" class="<?php echo $ivf_stimulation_chart->RFSH12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH12) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH13) == "") { ?>
		<th data-name="RFSH13" class="<?php echo $ivf_stimulation_chart->RFSH13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH13" class="<?php echo $ivf_stimulation_chart->RFSH13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH13) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG1) == "") { ?>
		<th data-name="HMG1" class="<?php echo $ivf_stimulation_chart->HMG1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG1" class="<?php echo $ivf_stimulation_chart->HMG1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG1) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG2) == "") { ?>
		<th data-name="HMG2" class="<?php echo $ivf_stimulation_chart->HMG2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG2" class="<?php echo $ivf_stimulation_chart->HMG2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG2) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG3) == "") { ?>
		<th data-name="HMG3" class="<?php echo $ivf_stimulation_chart->HMG3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG3" class="<?php echo $ivf_stimulation_chart->HMG3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG3) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG4) == "") { ?>
		<th data-name="HMG4" class="<?php echo $ivf_stimulation_chart->HMG4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG4" class="<?php echo $ivf_stimulation_chart->HMG4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG4) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG5) == "") { ?>
		<th data-name="HMG5" class="<?php echo $ivf_stimulation_chart->HMG5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG5" class="<?php echo $ivf_stimulation_chart->HMG5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG5) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG6) == "") { ?>
		<th data-name="HMG6" class="<?php echo $ivf_stimulation_chart->HMG6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG6" class="<?php echo $ivf_stimulation_chart->HMG6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG6) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG7) == "") { ?>
		<th data-name="HMG7" class="<?php echo $ivf_stimulation_chart->HMG7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG7" class="<?php echo $ivf_stimulation_chart->HMG7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG7) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG8) == "") { ?>
		<th data-name="HMG8" class="<?php echo $ivf_stimulation_chart->HMG8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG8" class="<?php echo $ivf_stimulation_chart->HMG8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG8) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG9) == "") { ?>
		<th data-name="HMG9" class="<?php echo $ivf_stimulation_chart->HMG9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG9" class="<?php echo $ivf_stimulation_chart->HMG9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG9) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG10) == "") { ?>
		<th data-name="HMG10" class="<?php echo $ivf_stimulation_chart->HMG10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG10" class="<?php echo $ivf_stimulation_chart->HMG10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG10) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG11) == "") { ?>
		<th data-name="HMG11" class="<?php echo $ivf_stimulation_chart->HMG11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG11" class="<?php echo $ivf_stimulation_chart->HMG11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG11) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG12) == "") { ?>
		<th data-name="HMG12" class="<?php echo $ivf_stimulation_chart->HMG12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG12" class="<?php echo $ivf_stimulation_chart->HMG12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG12) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG13) == "") { ?>
		<th data-name="HMG13" class="<?php echo $ivf_stimulation_chart->HMG13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG13" class="<?php echo $ivf_stimulation_chart->HMG13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG13) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH1) == "") { ?>
		<th data-name="GnRH1" class="<?php echo $ivf_stimulation_chart->GnRH1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH1" class="<?php echo $ivf_stimulation_chart->GnRH1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH1) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH2) == "") { ?>
		<th data-name="GnRH2" class="<?php echo $ivf_stimulation_chart->GnRH2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH2" class="<?php echo $ivf_stimulation_chart->GnRH2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH2) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH3) == "") { ?>
		<th data-name="GnRH3" class="<?php echo $ivf_stimulation_chart->GnRH3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH3" class="<?php echo $ivf_stimulation_chart->GnRH3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH3) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH4) == "") { ?>
		<th data-name="GnRH4" class="<?php echo $ivf_stimulation_chart->GnRH4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH4" class="<?php echo $ivf_stimulation_chart->GnRH4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH4) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH5) == "") { ?>
		<th data-name="GnRH5" class="<?php echo $ivf_stimulation_chart->GnRH5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH5" class="<?php echo $ivf_stimulation_chart->GnRH5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH5) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH6) == "") { ?>
		<th data-name="GnRH6" class="<?php echo $ivf_stimulation_chart->GnRH6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH6" class="<?php echo $ivf_stimulation_chart->GnRH6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH6) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH7) == "") { ?>
		<th data-name="GnRH7" class="<?php echo $ivf_stimulation_chart->GnRH7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH7" class="<?php echo $ivf_stimulation_chart->GnRH7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH7) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH8) == "") { ?>
		<th data-name="GnRH8" class="<?php echo $ivf_stimulation_chart->GnRH8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH8" class="<?php echo $ivf_stimulation_chart->GnRH8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH8) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH9) == "") { ?>
		<th data-name="GnRH9" class="<?php echo $ivf_stimulation_chart->GnRH9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH9" class="<?php echo $ivf_stimulation_chart->GnRH9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH9) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH10) == "") { ?>
		<th data-name="GnRH10" class="<?php echo $ivf_stimulation_chart->GnRH10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH10" class="<?php echo $ivf_stimulation_chart->GnRH10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH10) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH11) == "") { ?>
		<th data-name="GnRH11" class="<?php echo $ivf_stimulation_chart->GnRH11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH11" class="<?php echo $ivf_stimulation_chart->GnRH11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH11) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH12) == "") { ?>
		<th data-name="GnRH12" class="<?php echo $ivf_stimulation_chart->GnRH12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH12" class="<?php echo $ivf_stimulation_chart->GnRH12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH12) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH13) == "") { ?>
		<th data-name="GnRH13" class="<?php echo $ivf_stimulation_chart->GnRH13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH13" class="<?php echo $ivf_stimulation_chart->GnRH13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH13) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E21) == "") { ?>
		<th data-name="E21" class="<?php echo $ivf_stimulation_chart->E21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E21" class="<?php echo $ivf_stimulation_chart->E21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E21) ?>',1);"><div id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E22) == "") { ?>
		<th data-name="E22" class="<?php echo $ivf_stimulation_chart->E22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E22" class="<?php echo $ivf_stimulation_chart->E22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E22) ?>',1);"><div id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E23) == "") { ?>
		<th data-name="E23" class="<?php echo $ivf_stimulation_chart->E23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E23" class="<?php echo $ivf_stimulation_chart->E23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E23) ?>',1);"><div id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E24) == "") { ?>
		<th data-name="E24" class="<?php echo $ivf_stimulation_chart->E24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E24" class="<?php echo $ivf_stimulation_chart->E24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E24) ?>',1);"><div id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E25) == "") { ?>
		<th data-name="E25" class="<?php echo $ivf_stimulation_chart->E25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E25" class="<?php echo $ivf_stimulation_chart->E25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E25) ?>',1);"><div id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E26) == "") { ?>
		<th data-name="E26" class="<?php echo $ivf_stimulation_chart->E26->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E26->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E26" class="<?php echo $ivf_stimulation_chart->E26->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E26) ?>',1);"><div id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E26->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E26->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E26->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E27) == "") { ?>
		<th data-name="E27" class="<?php echo $ivf_stimulation_chart->E27->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E27->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E27" class="<?php echo $ivf_stimulation_chart->E27->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E27) ?>',1);"><div id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E27->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E27->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E27->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E28) == "") { ?>
		<th data-name="E28" class="<?php echo $ivf_stimulation_chart->E28->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E28->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E28" class="<?php echo $ivf_stimulation_chart->E28->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E28) ?>',1);"><div id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E28->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E28->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E28->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E29) == "") { ?>
		<th data-name="E29" class="<?php echo $ivf_stimulation_chart->E29->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E29" class="<?php echo $ivf_stimulation_chart->E29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E29) ?>',1);"><div id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E29->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E210) == "") { ?>
		<th data-name="E210" class="<?php echo $ivf_stimulation_chart->E210->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E210->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E210" class="<?php echo $ivf_stimulation_chart->E210->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E210) ?>',1);"><div id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E210->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E210->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E210->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E211) == "") { ?>
		<th data-name="E211" class="<?php echo $ivf_stimulation_chart->E211->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E211->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E211" class="<?php echo $ivf_stimulation_chart->E211->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E211) ?>',1);"><div id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E211->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E211->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E211->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E212) == "") { ?>
		<th data-name="E212" class="<?php echo $ivf_stimulation_chart->E212->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E212->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E212" class="<?php echo $ivf_stimulation_chart->E212->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E212) ?>',1);"><div id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E212->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E212->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E212->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E213) == "") { ?>
		<th data-name="E213" class="<?php echo $ivf_stimulation_chart->E213->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E213->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E213" class="<?php echo $ivf_stimulation_chart->E213->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E213) ?>',1);"><div id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E213->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E213->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E213->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P41) == "") { ?>
		<th data-name="P41" class="<?php echo $ivf_stimulation_chart->P41->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P41->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P41" class="<?php echo $ivf_stimulation_chart->P41->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P41) ?>',1);"><div id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P41->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P41->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P41->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P42) == "") { ?>
		<th data-name="P42" class="<?php echo $ivf_stimulation_chart->P42->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P42->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P42" class="<?php echo $ivf_stimulation_chart->P42->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P42) ?>',1);"><div id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P42->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P42->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P42->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P43) == "") { ?>
		<th data-name="P43" class="<?php echo $ivf_stimulation_chart->P43->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P43->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P43" class="<?php echo $ivf_stimulation_chart->P43->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P43) ?>',1);"><div id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P43->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P43->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P43->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P44) == "") { ?>
		<th data-name="P44" class="<?php echo $ivf_stimulation_chart->P44->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P44->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P44" class="<?php echo $ivf_stimulation_chart->P44->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P44) ?>',1);"><div id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P44->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P44->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P44->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P45) == "") { ?>
		<th data-name="P45" class="<?php echo $ivf_stimulation_chart->P45->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P45->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P45" class="<?php echo $ivf_stimulation_chart->P45->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P45) ?>',1);"><div id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P45->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P45->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P45->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P46) == "") { ?>
		<th data-name="P46" class="<?php echo $ivf_stimulation_chart->P46->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P46->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P46" class="<?php echo $ivf_stimulation_chart->P46->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P46) ?>',1);"><div id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P46->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P46->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P46->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P47) == "") { ?>
		<th data-name="P47" class="<?php echo $ivf_stimulation_chart->P47->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P47->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P47" class="<?php echo $ivf_stimulation_chart->P47->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P47) ?>',1);"><div id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P47->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P47->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P47->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P48) == "") { ?>
		<th data-name="P48" class="<?php echo $ivf_stimulation_chart->P48->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P48->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P48" class="<?php echo $ivf_stimulation_chart->P48->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P48) ?>',1);"><div id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P48->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P48->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P48->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P49) == "") { ?>
		<th data-name="P49" class="<?php echo $ivf_stimulation_chart->P49->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P49->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P49" class="<?php echo $ivf_stimulation_chart->P49->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P49) ?>',1);"><div id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P49->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P49->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P49->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P410) == "") { ?>
		<th data-name="P410" class="<?php echo $ivf_stimulation_chart->P410->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P410->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P410" class="<?php echo $ivf_stimulation_chart->P410->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P410) ?>',1);"><div id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P410->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P410->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P410->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P411) == "") { ?>
		<th data-name="P411" class="<?php echo $ivf_stimulation_chart->P411->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P411->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P411" class="<?php echo $ivf_stimulation_chart->P411->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P411) ?>',1);"><div id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P411->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P411->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P411->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P412) == "") { ?>
		<th data-name="P412" class="<?php echo $ivf_stimulation_chart->P412->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P412->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P412" class="<?php echo $ivf_stimulation_chart->P412->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P412) ?>',1);"><div id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P412->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P412->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P412->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P413) == "") { ?>
		<th data-name="P413" class="<?php echo $ivf_stimulation_chart->P413->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P413->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P413" class="<?php echo $ivf_stimulation_chart->P413->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P413) ?>',1);"><div id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P413->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P413->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P413->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt1) == "") { ?>
		<th data-name="USGRt1" class="<?php echo $ivf_stimulation_chart->USGRt1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt1" class="<?php echo $ivf_stimulation_chart->USGRt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt1) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt2) == "") { ?>
		<th data-name="USGRt2" class="<?php echo $ivf_stimulation_chart->USGRt2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt2" class="<?php echo $ivf_stimulation_chart->USGRt2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt2) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt3) == "") { ?>
		<th data-name="USGRt3" class="<?php echo $ivf_stimulation_chart->USGRt3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt3" class="<?php echo $ivf_stimulation_chart->USGRt3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt3) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt4) == "") { ?>
		<th data-name="USGRt4" class="<?php echo $ivf_stimulation_chart->USGRt4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt4" class="<?php echo $ivf_stimulation_chart->USGRt4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt4) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt5) == "") { ?>
		<th data-name="USGRt5" class="<?php echo $ivf_stimulation_chart->USGRt5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt5" class="<?php echo $ivf_stimulation_chart->USGRt5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt5) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt6) == "") { ?>
		<th data-name="USGRt6" class="<?php echo $ivf_stimulation_chart->USGRt6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt6" class="<?php echo $ivf_stimulation_chart->USGRt6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt6) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt7) == "") { ?>
		<th data-name="USGRt7" class="<?php echo $ivf_stimulation_chart->USGRt7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt7" class="<?php echo $ivf_stimulation_chart->USGRt7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt7) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt8) == "") { ?>
		<th data-name="USGRt8" class="<?php echo $ivf_stimulation_chart->USGRt8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt8" class="<?php echo $ivf_stimulation_chart->USGRt8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt8) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt9) == "") { ?>
		<th data-name="USGRt9" class="<?php echo $ivf_stimulation_chart->USGRt9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt9" class="<?php echo $ivf_stimulation_chart->USGRt9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt9) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt10) == "") { ?>
		<th data-name="USGRt10" class="<?php echo $ivf_stimulation_chart->USGRt10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt10" class="<?php echo $ivf_stimulation_chart->USGRt10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt10) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt11) == "") { ?>
		<th data-name="USGRt11" class="<?php echo $ivf_stimulation_chart->USGRt11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt11" class="<?php echo $ivf_stimulation_chart->USGRt11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt11) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt12) == "") { ?>
		<th data-name="USGRt12" class="<?php echo $ivf_stimulation_chart->USGRt12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt12" class="<?php echo $ivf_stimulation_chart->USGRt12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt12) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt13) == "") { ?>
		<th data-name="USGRt13" class="<?php echo $ivf_stimulation_chart->USGRt13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt13" class="<?php echo $ivf_stimulation_chart->USGRt13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt13) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt1) == "") { ?>
		<th data-name="USGLt1" class="<?php echo $ivf_stimulation_chart->USGLt1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt1" class="<?php echo $ivf_stimulation_chart->USGLt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt1) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt2) == "") { ?>
		<th data-name="USGLt2" class="<?php echo $ivf_stimulation_chart->USGLt2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt2" class="<?php echo $ivf_stimulation_chart->USGLt2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt2) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt3) == "") { ?>
		<th data-name="USGLt3" class="<?php echo $ivf_stimulation_chart->USGLt3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt3" class="<?php echo $ivf_stimulation_chart->USGLt3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt3) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt4) == "") { ?>
		<th data-name="USGLt4" class="<?php echo $ivf_stimulation_chart->USGLt4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt4" class="<?php echo $ivf_stimulation_chart->USGLt4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt4) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt5) == "") { ?>
		<th data-name="USGLt5" class="<?php echo $ivf_stimulation_chart->USGLt5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt5" class="<?php echo $ivf_stimulation_chart->USGLt5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt5) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt6) == "") { ?>
		<th data-name="USGLt6" class="<?php echo $ivf_stimulation_chart->USGLt6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt6" class="<?php echo $ivf_stimulation_chart->USGLt6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt6) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt7) == "") { ?>
		<th data-name="USGLt7" class="<?php echo $ivf_stimulation_chart->USGLt7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt7" class="<?php echo $ivf_stimulation_chart->USGLt7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt7) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt8) == "") { ?>
		<th data-name="USGLt8" class="<?php echo $ivf_stimulation_chart->USGLt8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt8" class="<?php echo $ivf_stimulation_chart->USGLt8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt8) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt9) == "") { ?>
		<th data-name="USGLt9" class="<?php echo $ivf_stimulation_chart->USGLt9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt9" class="<?php echo $ivf_stimulation_chart->USGLt9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt9) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt10) == "") { ?>
		<th data-name="USGLt10" class="<?php echo $ivf_stimulation_chart->USGLt10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt10" class="<?php echo $ivf_stimulation_chart->USGLt10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt10) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt11) == "") { ?>
		<th data-name="USGLt11" class="<?php echo $ivf_stimulation_chart->USGLt11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt11" class="<?php echo $ivf_stimulation_chart->USGLt11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt11) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt12) == "") { ?>
		<th data-name="USGLt12" class="<?php echo $ivf_stimulation_chart->USGLt12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt12" class="<?php echo $ivf_stimulation_chart->USGLt12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt12) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt13) == "") { ?>
		<th data-name="USGLt13" class="<?php echo $ivf_stimulation_chart->USGLt13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt13" class="<?php echo $ivf_stimulation_chart->USGLt13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt13) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM1) == "") { ?>
		<th data-name="EM1" class="<?php echo $ivf_stimulation_chart->EM1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM1" class="<?php echo $ivf_stimulation_chart->EM1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM1) ?>',1);"><div id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM2) == "") { ?>
		<th data-name="EM2" class="<?php echo $ivf_stimulation_chart->EM2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM2" class="<?php echo $ivf_stimulation_chart->EM2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM2) ?>',1);"><div id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM3) == "") { ?>
		<th data-name="EM3" class="<?php echo $ivf_stimulation_chart->EM3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM3" class="<?php echo $ivf_stimulation_chart->EM3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM3) ?>',1);"><div id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM4) == "") { ?>
		<th data-name="EM4" class="<?php echo $ivf_stimulation_chart->EM4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM4" class="<?php echo $ivf_stimulation_chart->EM4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM4) ?>',1);"><div id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM5) == "") { ?>
		<th data-name="EM5" class="<?php echo $ivf_stimulation_chart->EM5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM5" class="<?php echo $ivf_stimulation_chart->EM5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM5) ?>',1);"><div id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM6) == "") { ?>
		<th data-name="EM6" class="<?php echo $ivf_stimulation_chart->EM6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM6" class="<?php echo $ivf_stimulation_chart->EM6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM6) ?>',1);"><div id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM7) == "") { ?>
		<th data-name="EM7" class="<?php echo $ivf_stimulation_chart->EM7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM7" class="<?php echo $ivf_stimulation_chart->EM7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM7) ?>',1);"><div id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM8) == "") { ?>
		<th data-name="EM8" class="<?php echo $ivf_stimulation_chart->EM8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM8" class="<?php echo $ivf_stimulation_chart->EM8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM8) ?>',1);"><div id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM9) == "") { ?>
		<th data-name="EM9" class="<?php echo $ivf_stimulation_chart->EM9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM9" class="<?php echo $ivf_stimulation_chart->EM9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM9) ?>',1);"><div id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM10) == "") { ?>
		<th data-name="EM10" class="<?php echo $ivf_stimulation_chart->EM10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM10" class="<?php echo $ivf_stimulation_chart->EM10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM10) ?>',1);"><div id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM11) == "") { ?>
		<th data-name="EM11" class="<?php echo $ivf_stimulation_chart->EM11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM11" class="<?php echo $ivf_stimulation_chart->EM11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM11) ?>',1);"><div id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM12) == "") { ?>
		<th data-name="EM12" class="<?php echo $ivf_stimulation_chart->EM12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM12" class="<?php echo $ivf_stimulation_chart->EM12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM12) ?>',1);"><div id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM13) == "") { ?>
		<th data-name="EM13" class="<?php echo $ivf_stimulation_chart->EM13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM13" class="<?php echo $ivf_stimulation_chart->EM13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM13) ?>',1);"><div id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others1) == "") { ?>
		<th data-name="Others1" class="<?php echo $ivf_stimulation_chart->Others1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others1" class="<?php echo $ivf_stimulation_chart->Others1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others1) ?>',1);"><div id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others2) == "") { ?>
		<th data-name="Others2" class="<?php echo $ivf_stimulation_chart->Others2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others2" class="<?php echo $ivf_stimulation_chart->Others2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others2) ?>',1);"><div id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others3) == "") { ?>
		<th data-name="Others3" class="<?php echo $ivf_stimulation_chart->Others3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others3" class="<?php echo $ivf_stimulation_chart->Others3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others3) ?>',1);"><div id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others4) == "") { ?>
		<th data-name="Others4" class="<?php echo $ivf_stimulation_chart->Others4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others4" class="<?php echo $ivf_stimulation_chart->Others4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others4) ?>',1);"><div id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others5) == "") { ?>
		<th data-name="Others5" class="<?php echo $ivf_stimulation_chart->Others5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others5" class="<?php echo $ivf_stimulation_chart->Others5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others5) ?>',1);"><div id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others6) == "") { ?>
		<th data-name="Others6" class="<?php echo $ivf_stimulation_chart->Others6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others6" class="<?php echo $ivf_stimulation_chart->Others6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others6) ?>',1);"><div id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others7) == "") { ?>
		<th data-name="Others7" class="<?php echo $ivf_stimulation_chart->Others7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others7" class="<?php echo $ivf_stimulation_chart->Others7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others7) ?>',1);"><div id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others8) == "") { ?>
		<th data-name="Others8" class="<?php echo $ivf_stimulation_chart->Others8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others8" class="<?php echo $ivf_stimulation_chart->Others8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others8) ?>',1);"><div id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others9) == "") { ?>
		<th data-name="Others9" class="<?php echo $ivf_stimulation_chart->Others9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others9" class="<?php echo $ivf_stimulation_chart->Others9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others9) ?>',1);"><div id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others10) == "") { ?>
		<th data-name="Others10" class="<?php echo $ivf_stimulation_chart->Others10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others10" class="<?php echo $ivf_stimulation_chart->Others10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others10) ?>',1);"><div id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others11) == "") { ?>
		<th data-name="Others11" class="<?php echo $ivf_stimulation_chart->Others11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others11" class="<?php echo $ivf_stimulation_chart->Others11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others11) ?>',1);"><div id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others12) == "") { ?>
		<th data-name="Others12" class="<?php echo $ivf_stimulation_chart->Others12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others12" class="<?php echo $ivf_stimulation_chart->Others12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others12) ?>',1);"><div id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others13) == "") { ?>
		<th data-name="Others13" class="<?php echo $ivf_stimulation_chart->Others13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others13" class="<?php echo $ivf_stimulation_chart->Others13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others13) ?>',1);"><div id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR1) == "") { ?>
		<th data-name="DR1" class="<?php echo $ivf_stimulation_chart->DR1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR1" class="<?php echo $ivf_stimulation_chart->DR1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR1) ?>',1);"><div id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR2) == "") { ?>
		<th data-name="DR2" class="<?php echo $ivf_stimulation_chart->DR2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR2" class="<?php echo $ivf_stimulation_chart->DR2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR2) ?>',1);"><div id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR3) == "") { ?>
		<th data-name="DR3" class="<?php echo $ivf_stimulation_chart->DR3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR3" class="<?php echo $ivf_stimulation_chart->DR3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR3) ?>',1);"><div id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR4) == "") { ?>
		<th data-name="DR4" class="<?php echo $ivf_stimulation_chart->DR4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR4" class="<?php echo $ivf_stimulation_chart->DR4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR4) ?>',1);"><div id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR5) == "") { ?>
		<th data-name="DR5" class="<?php echo $ivf_stimulation_chart->DR5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR5" class="<?php echo $ivf_stimulation_chart->DR5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR5) ?>',1);"><div id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR6) == "") { ?>
		<th data-name="DR6" class="<?php echo $ivf_stimulation_chart->DR6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR6" class="<?php echo $ivf_stimulation_chart->DR6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR6) ?>',1);"><div id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR7) == "") { ?>
		<th data-name="DR7" class="<?php echo $ivf_stimulation_chart->DR7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR7" class="<?php echo $ivf_stimulation_chart->DR7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR7) ?>',1);"><div id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR8) == "") { ?>
		<th data-name="DR8" class="<?php echo $ivf_stimulation_chart->DR8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR8" class="<?php echo $ivf_stimulation_chart->DR8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR8) ?>',1);"><div id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR9) == "") { ?>
		<th data-name="DR9" class="<?php echo $ivf_stimulation_chart->DR9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR9" class="<?php echo $ivf_stimulation_chart->DR9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR9) ?>',1);"><div id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR10) == "") { ?>
		<th data-name="DR10" class="<?php echo $ivf_stimulation_chart->DR10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR10" class="<?php echo $ivf_stimulation_chart->DR10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR10) ?>',1);"><div id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR11) == "") { ?>
		<th data-name="DR11" class="<?php echo $ivf_stimulation_chart->DR11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR11->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR11" class="<?php echo $ivf_stimulation_chart->DR11->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR11) ?>',1);"><div id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR11->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR11->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR11->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR12) == "") { ?>
		<th data-name="DR12" class="<?php echo $ivf_stimulation_chart->DR12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR12->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR12" class="<?php echo $ivf_stimulation_chart->DR12->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR12) ?>',1);"><div id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR12->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR12->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR12->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR13) == "") { ?>
		<th data-name="DR13" class="<?php echo $ivf_stimulation_chart->DR13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR13->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR13" class="<?php echo $ivf_stimulation_chart->DR13->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR13) ?>',1);"><div id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR13->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR13->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR13->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_stimulation_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_stimulation_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TidNo) ?>',1);"><div id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Convert) == "") { ?>
		<th data-name="Convert" class="<?php echo $ivf_stimulation_chart->Convert->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Convert->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Convert" class="<?php echo $ivf_stimulation_chart->Convert->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Convert) ?>',1);"><div id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Convert->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Convert->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Convert->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_stimulation_chart->Consultant->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_stimulation_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Consultant) ?>',1);"><div id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_stimulation_chart->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_stimulation_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->InseminatinTechnique) ?>',1);"><div id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->IndicationForART) == "") { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_stimulation_chart->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_stimulation_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->IndicationForART) ?>',1);"><div id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->IndicationForART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->IndicationForART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Hysteroscopy) == "") { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_stimulation_chart->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_stimulation_chart->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Hysteroscopy) ?>',1);"><div id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Hysteroscopy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Hysteroscopy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EndometrialScratching) == "") { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_stimulation_chart->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_stimulation_chart->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EndometrialScratching) ?>',1);"><div id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EndometrialScratching->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EndometrialScratching->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_stimulation_chart->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_stimulation_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TrialCannulation) ?>',1);"><div id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TrialCannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TrialCannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CYCLETYPE) == "") { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_stimulation_chart->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_stimulation_chart->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CYCLETYPE) ?>',1);"><div id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CYCLETYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CYCLETYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HRTCYCLE) == "") { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_stimulation_chart->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_stimulation_chart->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HRTCYCLE) ?>',1);"><div id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HRTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HRTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->OralEstrogenDosage) == "") { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->OralEstrogenDosage) ?>',1);"><div id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->OralEstrogenDosage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->OralEstrogenDosage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->VaginalEstrogen) == "") { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_stimulation_chart->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_stimulation_chart->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->VaginalEstrogen) ?>',1);"><div id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->VaginalEstrogen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->VaginalEstrogen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GCSF) == "") { ?>
		<th data-name="GCSF" class="<?php echo $ivf_stimulation_chart->GCSF->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GCSF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GCSF" class="<?php echo $ivf_stimulation_chart->GCSF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GCSF) ?>',1);"><div id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GCSF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GCSF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ActivatedPRP) == "") { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_stimulation_chart->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_stimulation_chart->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ActivatedPRP) ?>',1);"><div id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ActivatedPRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ActivatedPRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->UCLcm) == "") { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_stimulation_chart->UCLcm->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UCLcm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_stimulation_chart->UCLcm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->UCLcm) ?>',1);"><div id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UCLcm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->UCLcm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->UCLcm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DATOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DATOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DATOFEMBRYOTRANSFER) ?>',1);"><div id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER) ?>',1);"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->NOOFEMBRYOSTHAWED) == "") { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NOOFEMBRYOSTHAWED) ?>',1);"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED) ?>',1);"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DAYOFEMBRYOS) == "") { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DAYOFEMBRYOS) ?>',1);"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DAYOFEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS) ?>',1);"><div id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ViaAdmin) == "") { ?>
		<th data-name="ViaAdmin" class="<?php echo $ivf_stimulation_chart->ViaAdmin->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViaAdmin" class="<?php echo $ivf_stimulation_chart->ViaAdmin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaAdmin) ?>',1);"><div id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ViaAdmin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ViaAdmin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ViaStartDateTime) == "") { ?>
		<th data-name="ViaStartDateTime" class="<?php echo $ivf_stimulation_chart->ViaStartDateTime->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViaStartDateTime" class="<?php echo $ivf_stimulation_chart->ViaStartDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaStartDateTime) ?>',1);"><div id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ViaStartDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ViaStartDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ViaDose) == "") { ?>
		<th data-name="ViaDose" class="<?php echo $ivf_stimulation_chart->ViaDose->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaDose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViaDose" class="<?php echo $ivf_stimulation_chart->ViaDose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ViaDose) ?>',1);"><div id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ViaDose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ViaDose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ViaDose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->AllFreeze) == "") { ?>
		<th data-name="AllFreeze" class="<?php echo $ivf_stimulation_chart->AllFreeze->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllFreeze" class="<?php echo $ivf_stimulation_chart->AllFreeze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->AllFreeze) ?>',1);"><div id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->AllFreeze->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->AllFreeze->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TreatmentCancel) == "") { ?>
		<th data-name="TreatmentCancel" class="<?php echo $ivf_stimulation_chart->TreatmentCancel->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentCancel" class="<?php echo $ivf_stimulation_chart->TreatmentCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TreatmentCancel) ?>',1);"><div id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TreatmentCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TreatmentCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ProgesteroneAdmin) == "") { ?>
		<th data-name="ProgesteroneAdmin" class="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgesteroneAdmin" class="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneAdmin) ?>',1);"><div id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ProgesteroneAdmin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ProgesteroneAdmin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ProgesteroneStart) == "") { ?>
		<th data-name="ProgesteroneStart" class="<?php echo $ivf_stimulation_chart->ProgesteroneStart->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgesteroneStart" class="<?php echo $ivf_stimulation_chart->ProgesteroneStart->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneStart) ?>',1);"><div id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ProgesteroneStart->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ProgesteroneStart->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ProgesteroneDose) == "") { ?>
		<th data-name="ProgesteroneDose" class="<?php echo $ivf_stimulation_chart->ProgesteroneDose->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgesteroneDose" class="<?php echo $ivf_stimulation_chart->ProgesteroneDose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ProgesteroneDose) ?>',1);"><div id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ProgesteroneDose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ProgesteroneDose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate14) == "") { ?>
		<th data-name="StChDate14" class="<?php echo $ivf_stimulation_chart->StChDate14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate14" class="<?php echo $ivf_stimulation_chart->StChDate14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate14) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate15) == "") { ?>
		<th data-name="StChDate15" class="<?php echo $ivf_stimulation_chart->StChDate15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate15" class="<?php echo $ivf_stimulation_chart->StChDate15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate15) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate16) == "") { ?>
		<th data-name="StChDate16" class="<?php echo $ivf_stimulation_chart->StChDate16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate16" class="<?php echo $ivf_stimulation_chart->StChDate16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate16) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate17) == "") { ?>
		<th data-name="StChDate17" class="<?php echo $ivf_stimulation_chart->StChDate17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate17" class="<?php echo $ivf_stimulation_chart->StChDate17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate17) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate18) == "") { ?>
		<th data-name="StChDate18" class="<?php echo $ivf_stimulation_chart->StChDate18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate18" class="<?php echo $ivf_stimulation_chart->StChDate18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate18) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate19) == "") { ?>
		<th data-name="StChDate19" class="<?php echo $ivf_stimulation_chart->StChDate19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate19" class="<?php echo $ivf_stimulation_chart->StChDate19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate19) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate20) == "") { ?>
		<th data-name="StChDate20" class="<?php echo $ivf_stimulation_chart->StChDate20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate20" class="<?php echo $ivf_stimulation_chart->StChDate20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate20) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate21) == "") { ?>
		<th data-name="StChDate21" class="<?php echo $ivf_stimulation_chart->StChDate21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate21" class="<?php echo $ivf_stimulation_chart->StChDate21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate21) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate22) == "") { ?>
		<th data-name="StChDate22" class="<?php echo $ivf_stimulation_chart->StChDate22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate22" class="<?php echo $ivf_stimulation_chart->StChDate22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate22) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate23) == "") { ?>
		<th data-name="StChDate23" class="<?php echo $ivf_stimulation_chart->StChDate23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate23" class="<?php echo $ivf_stimulation_chart->StChDate23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate23) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate24) == "") { ?>
		<th data-name="StChDate24" class="<?php echo $ivf_stimulation_chart->StChDate24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate24" class="<?php echo $ivf_stimulation_chart->StChDate24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate24) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StChDate25) == "") { ?>
		<th data-name="StChDate25" class="<?php echo $ivf_stimulation_chart->StChDate25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StChDate25" class="<?php echo $ivf_stimulation_chart->StChDate25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StChDate25) ?>',1);"><div id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StChDate25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StChDate25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay14) == "") { ?>
		<th data-name="CycleDay14" class="<?php echo $ivf_stimulation_chart->CycleDay14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay14" class="<?php echo $ivf_stimulation_chart->CycleDay14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay14) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay15) == "") { ?>
		<th data-name="CycleDay15" class="<?php echo $ivf_stimulation_chart->CycleDay15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay15" class="<?php echo $ivf_stimulation_chart->CycleDay15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay15) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay16) == "") { ?>
		<th data-name="CycleDay16" class="<?php echo $ivf_stimulation_chart->CycleDay16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay16" class="<?php echo $ivf_stimulation_chart->CycleDay16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay16) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay17) == "") { ?>
		<th data-name="CycleDay17" class="<?php echo $ivf_stimulation_chart->CycleDay17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay17" class="<?php echo $ivf_stimulation_chart->CycleDay17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay17) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay18) == "") { ?>
		<th data-name="CycleDay18" class="<?php echo $ivf_stimulation_chart->CycleDay18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay18" class="<?php echo $ivf_stimulation_chart->CycleDay18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay18) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay19) == "") { ?>
		<th data-name="CycleDay19" class="<?php echo $ivf_stimulation_chart->CycleDay19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay19" class="<?php echo $ivf_stimulation_chart->CycleDay19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay19) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay20) == "") { ?>
		<th data-name="CycleDay20" class="<?php echo $ivf_stimulation_chart->CycleDay20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay20" class="<?php echo $ivf_stimulation_chart->CycleDay20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay20) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay21) == "") { ?>
		<th data-name="CycleDay21" class="<?php echo $ivf_stimulation_chart->CycleDay21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay21" class="<?php echo $ivf_stimulation_chart->CycleDay21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay21) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay22) == "") { ?>
		<th data-name="CycleDay22" class="<?php echo $ivf_stimulation_chart->CycleDay22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay22" class="<?php echo $ivf_stimulation_chart->CycleDay22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay22) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay23) == "") { ?>
		<th data-name="CycleDay23" class="<?php echo $ivf_stimulation_chart->CycleDay23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay23" class="<?php echo $ivf_stimulation_chart->CycleDay23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay23) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay24) == "") { ?>
		<th data-name="CycleDay24" class="<?php echo $ivf_stimulation_chart->CycleDay24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay24" class="<?php echo $ivf_stimulation_chart->CycleDay24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay24) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->CycleDay25) == "") { ?>
		<th data-name="CycleDay25" class="<?php echo $ivf_stimulation_chart->CycleDay25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CycleDay25" class="<?php echo $ivf_stimulation_chart->CycleDay25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->CycleDay25) ?>',1);"><div id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->CycleDay25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->CycleDay25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay14) == "") { ?>
		<th data-name="StimulationDay14" class="<?php echo $ivf_stimulation_chart->StimulationDay14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay14" class="<?php echo $ivf_stimulation_chart->StimulationDay14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay14) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay15) == "") { ?>
		<th data-name="StimulationDay15" class="<?php echo $ivf_stimulation_chart->StimulationDay15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay15" class="<?php echo $ivf_stimulation_chart->StimulationDay15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay15) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay16) == "") { ?>
		<th data-name="StimulationDay16" class="<?php echo $ivf_stimulation_chart->StimulationDay16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay16" class="<?php echo $ivf_stimulation_chart->StimulationDay16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay16) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay17) == "") { ?>
		<th data-name="StimulationDay17" class="<?php echo $ivf_stimulation_chart->StimulationDay17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay17" class="<?php echo $ivf_stimulation_chart->StimulationDay17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay17) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay18) == "") { ?>
		<th data-name="StimulationDay18" class="<?php echo $ivf_stimulation_chart->StimulationDay18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay18" class="<?php echo $ivf_stimulation_chart->StimulationDay18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay18) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay19) == "") { ?>
		<th data-name="StimulationDay19" class="<?php echo $ivf_stimulation_chart->StimulationDay19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay19" class="<?php echo $ivf_stimulation_chart->StimulationDay19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay19) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay20) == "") { ?>
		<th data-name="StimulationDay20" class="<?php echo $ivf_stimulation_chart->StimulationDay20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay20" class="<?php echo $ivf_stimulation_chart->StimulationDay20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay20) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay21) == "") { ?>
		<th data-name="StimulationDay21" class="<?php echo $ivf_stimulation_chart->StimulationDay21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay21" class="<?php echo $ivf_stimulation_chart->StimulationDay21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay21) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay22) == "") { ?>
		<th data-name="StimulationDay22" class="<?php echo $ivf_stimulation_chart->StimulationDay22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay22" class="<?php echo $ivf_stimulation_chart->StimulationDay22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay22) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay23) == "") { ?>
		<th data-name="StimulationDay23" class="<?php echo $ivf_stimulation_chart->StimulationDay23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay23" class="<?php echo $ivf_stimulation_chart->StimulationDay23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay23) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay24) == "") { ?>
		<th data-name="StimulationDay24" class="<?php echo $ivf_stimulation_chart->StimulationDay24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay24" class="<?php echo $ivf_stimulation_chart->StimulationDay24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay24) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->StimulationDay25) == "") { ?>
		<th data-name="StimulationDay25" class="<?php echo $ivf_stimulation_chart->StimulationDay25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StimulationDay25" class="<?php echo $ivf_stimulation_chart->StimulationDay25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->StimulationDay25) ?>',1);"><div id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->StimulationDay25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->StimulationDay25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet14) == "") { ?>
		<th data-name="Tablet14" class="<?php echo $ivf_stimulation_chart->Tablet14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet14" class="<?php echo $ivf_stimulation_chart->Tablet14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet14) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet15) == "") { ?>
		<th data-name="Tablet15" class="<?php echo $ivf_stimulation_chart->Tablet15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet15" class="<?php echo $ivf_stimulation_chart->Tablet15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet15) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet16) == "") { ?>
		<th data-name="Tablet16" class="<?php echo $ivf_stimulation_chart->Tablet16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet16" class="<?php echo $ivf_stimulation_chart->Tablet16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet16) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet17) == "") { ?>
		<th data-name="Tablet17" class="<?php echo $ivf_stimulation_chart->Tablet17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet17" class="<?php echo $ivf_stimulation_chart->Tablet17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet17) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet18) == "") { ?>
		<th data-name="Tablet18" class="<?php echo $ivf_stimulation_chart->Tablet18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet18" class="<?php echo $ivf_stimulation_chart->Tablet18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet18) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet19) == "") { ?>
		<th data-name="Tablet19" class="<?php echo $ivf_stimulation_chart->Tablet19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet19" class="<?php echo $ivf_stimulation_chart->Tablet19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet19) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet20) == "") { ?>
		<th data-name="Tablet20" class="<?php echo $ivf_stimulation_chart->Tablet20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet20" class="<?php echo $ivf_stimulation_chart->Tablet20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet20) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet21) == "") { ?>
		<th data-name="Tablet21" class="<?php echo $ivf_stimulation_chart->Tablet21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet21" class="<?php echo $ivf_stimulation_chart->Tablet21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet21) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet22) == "") { ?>
		<th data-name="Tablet22" class="<?php echo $ivf_stimulation_chart->Tablet22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet22" class="<?php echo $ivf_stimulation_chart->Tablet22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet22) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet23) == "") { ?>
		<th data-name="Tablet23" class="<?php echo $ivf_stimulation_chart->Tablet23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet23" class="<?php echo $ivf_stimulation_chart->Tablet23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet23) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet24) == "") { ?>
		<th data-name="Tablet24" class="<?php echo $ivf_stimulation_chart->Tablet24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet24" class="<?php echo $ivf_stimulation_chart->Tablet24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet24) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Tablet25) == "") { ?>
		<th data-name="Tablet25" class="<?php echo $ivf_stimulation_chart->Tablet25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tablet25" class="<?php echo $ivf_stimulation_chart->Tablet25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Tablet25) ?>',1);"><div id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Tablet25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Tablet25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH14) == "") { ?>
		<th data-name="RFSH14" class="<?php echo $ivf_stimulation_chart->RFSH14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH14" class="<?php echo $ivf_stimulation_chart->RFSH14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH14) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH15) == "") { ?>
		<th data-name="RFSH15" class="<?php echo $ivf_stimulation_chart->RFSH15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH15" class="<?php echo $ivf_stimulation_chart->RFSH15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH15) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH16) == "") { ?>
		<th data-name="RFSH16" class="<?php echo $ivf_stimulation_chart->RFSH16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH16" class="<?php echo $ivf_stimulation_chart->RFSH16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH16) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH17) == "") { ?>
		<th data-name="RFSH17" class="<?php echo $ivf_stimulation_chart->RFSH17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH17" class="<?php echo $ivf_stimulation_chart->RFSH17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH17) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH18) == "") { ?>
		<th data-name="RFSH18" class="<?php echo $ivf_stimulation_chart->RFSH18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH18" class="<?php echo $ivf_stimulation_chart->RFSH18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH18) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH19) == "") { ?>
		<th data-name="RFSH19" class="<?php echo $ivf_stimulation_chart->RFSH19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH19" class="<?php echo $ivf_stimulation_chart->RFSH19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH19) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH20) == "") { ?>
		<th data-name="RFSH20" class="<?php echo $ivf_stimulation_chart->RFSH20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH20" class="<?php echo $ivf_stimulation_chart->RFSH20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH20) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH21) == "") { ?>
		<th data-name="RFSH21" class="<?php echo $ivf_stimulation_chart->RFSH21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH21" class="<?php echo $ivf_stimulation_chart->RFSH21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH21) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH22) == "") { ?>
		<th data-name="RFSH22" class="<?php echo $ivf_stimulation_chart->RFSH22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH22" class="<?php echo $ivf_stimulation_chart->RFSH22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH22) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH23) == "") { ?>
		<th data-name="RFSH23" class="<?php echo $ivf_stimulation_chart->RFSH23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH23" class="<?php echo $ivf_stimulation_chart->RFSH23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH23) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH24) == "") { ?>
		<th data-name="RFSH24" class="<?php echo $ivf_stimulation_chart->RFSH24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH24" class="<?php echo $ivf_stimulation_chart->RFSH24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH24) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->RFSH25) == "") { ?>
		<th data-name="RFSH25" class="<?php echo $ivf_stimulation_chart->RFSH25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH25" class="<?php echo $ivf_stimulation_chart->RFSH25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->RFSH25) ?>',1);"><div id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->RFSH25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->RFSH25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG14) == "") { ?>
		<th data-name="HMG14" class="<?php echo $ivf_stimulation_chart->HMG14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG14" class="<?php echo $ivf_stimulation_chart->HMG14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG14) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG15) == "") { ?>
		<th data-name="HMG15" class="<?php echo $ivf_stimulation_chart->HMG15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG15" class="<?php echo $ivf_stimulation_chart->HMG15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG15) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG16) == "") { ?>
		<th data-name="HMG16" class="<?php echo $ivf_stimulation_chart->HMG16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG16" class="<?php echo $ivf_stimulation_chart->HMG16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG16) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG17) == "") { ?>
		<th data-name="HMG17" class="<?php echo $ivf_stimulation_chart->HMG17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG17" class="<?php echo $ivf_stimulation_chart->HMG17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG17) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG18) == "") { ?>
		<th data-name="HMG18" class="<?php echo $ivf_stimulation_chart->HMG18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG18" class="<?php echo $ivf_stimulation_chart->HMG18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG18) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG19) == "") { ?>
		<th data-name="HMG19" class="<?php echo $ivf_stimulation_chart->HMG19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG19" class="<?php echo $ivf_stimulation_chart->HMG19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG19) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG20) == "") { ?>
		<th data-name="HMG20" class="<?php echo $ivf_stimulation_chart->HMG20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG20" class="<?php echo $ivf_stimulation_chart->HMG20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG20) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG21) == "") { ?>
		<th data-name="HMG21" class="<?php echo $ivf_stimulation_chart->HMG21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG21" class="<?php echo $ivf_stimulation_chart->HMG21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG21) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG22) == "") { ?>
		<th data-name="HMG22" class="<?php echo $ivf_stimulation_chart->HMG22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG22" class="<?php echo $ivf_stimulation_chart->HMG22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG22) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG23) == "") { ?>
		<th data-name="HMG23" class="<?php echo $ivf_stimulation_chart->HMG23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG23" class="<?php echo $ivf_stimulation_chart->HMG23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG23) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG24) == "") { ?>
		<th data-name="HMG24" class="<?php echo $ivf_stimulation_chart->HMG24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG24" class="<?php echo $ivf_stimulation_chart->HMG24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG24) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HMG25) == "") { ?>
		<th data-name="HMG25" class="<?php echo $ivf_stimulation_chart->HMG25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG25" class="<?php echo $ivf_stimulation_chart->HMG25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HMG25) ?>',1);"><div id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HMG25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HMG25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HMG25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH14) == "") { ?>
		<th data-name="GnRH14" class="<?php echo $ivf_stimulation_chart->GnRH14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH14" class="<?php echo $ivf_stimulation_chart->GnRH14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH14) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH15) == "") { ?>
		<th data-name="GnRH15" class="<?php echo $ivf_stimulation_chart->GnRH15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH15" class="<?php echo $ivf_stimulation_chart->GnRH15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH15) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH16) == "") { ?>
		<th data-name="GnRH16" class="<?php echo $ivf_stimulation_chart->GnRH16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH16" class="<?php echo $ivf_stimulation_chart->GnRH16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH16) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH17) == "") { ?>
		<th data-name="GnRH17" class="<?php echo $ivf_stimulation_chart->GnRH17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH17" class="<?php echo $ivf_stimulation_chart->GnRH17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH17) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH18) == "") { ?>
		<th data-name="GnRH18" class="<?php echo $ivf_stimulation_chart->GnRH18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH18" class="<?php echo $ivf_stimulation_chart->GnRH18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH18) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH19) == "") { ?>
		<th data-name="GnRH19" class="<?php echo $ivf_stimulation_chart->GnRH19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH19" class="<?php echo $ivf_stimulation_chart->GnRH19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH19) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH20) == "") { ?>
		<th data-name="GnRH20" class="<?php echo $ivf_stimulation_chart->GnRH20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH20" class="<?php echo $ivf_stimulation_chart->GnRH20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH20) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH21) == "") { ?>
		<th data-name="GnRH21" class="<?php echo $ivf_stimulation_chart->GnRH21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH21" class="<?php echo $ivf_stimulation_chart->GnRH21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH21) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH22) == "") { ?>
		<th data-name="GnRH22" class="<?php echo $ivf_stimulation_chart->GnRH22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH22" class="<?php echo $ivf_stimulation_chart->GnRH22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH22) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH23) == "") { ?>
		<th data-name="GnRH23" class="<?php echo $ivf_stimulation_chart->GnRH23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH23" class="<?php echo $ivf_stimulation_chart->GnRH23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH23) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH24) == "") { ?>
		<th data-name="GnRH24" class="<?php echo $ivf_stimulation_chart->GnRH24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH24" class="<?php echo $ivf_stimulation_chart->GnRH24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH24) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->GnRH25) == "") { ?>
		<th data-name="GnRH25" class="<?php echo $ivf_stimulation_chart->GnRH25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GnRH25" class="<?php echo $ivf_stimulation_chart->GnRH25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->GnRH25) ?>',1);"><div id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->GnRH25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->GnRH25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P414) == "") { ?>
		<th data-name="P414" class="<?php echo $ivf_stimulation_chart->P414->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P414->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P414" class="<?php echo $ivf_stimulation_chart->P414->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P414) ?>',1);"><div id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P414->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P414->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P414->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P415) == "") { ?>
		<th data-name="P415" class="<?php echo $ivf_stimulation_chart->P415->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P415->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P415" class="<?php echo $ivf_stimulation_chart->P415->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P415) ?>',1);"><div id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P415->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P415->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P415->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P416) == "") { ?>
		<th data-name="P416" class="<?php echo $ivf_stimulation_chart->P416->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P416->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P416" class="<?php echo $ivf_stimulation_chart->P416->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P416) ?>',1);"><div id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P416->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P416->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P416->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P417) == "") { ?>
		<th data-name="P417" class="<?php echo $ivf_stimulation_chart->P417->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P417->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P417" class="<?php echo $ivf_stimulation_chart->P417->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P417) ?>',1);"><div id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P417->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P417->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P417->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P418) == "") { ?>
		<th data-name="P418" class="<?php echo $ivf_stimulation_chart->P418->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P418->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P418" class="<?php echo $ivf_stimulation_chart->P418->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P418) ?>',1);"><div id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P418->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P418->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P418->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P419) == "") { ?>
		<th data-name="P419" class="<?php echo $ivf_stimulation_chart->P419->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P419->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P419" class="<?php echo $ivf_stimulation_chart->P419->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P419) ?>',1);"><div id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P419->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P419->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P419->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P420) == "") { ?>
		<th data-name="P420" class="<?php echo $ivf_stimulation_chart->P420->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P420->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P420" class="<?php echo $ivf_stimulation_chart->P420->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P420) ?>',1);"><div id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P420->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P420->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P420->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P421) == "") { ?>
		<th data-name="P421" class="<?php echo $ivf_stimulation_chart->P421->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P421->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P421" class="<?php echo $ivf_stimulation_chart->P421->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P421) ?>',1);"><div id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P421->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P421->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P421->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P422) == "") { ?>
		<th data-name="P422" class="<?php echo $ivf_stimulation_chart->P422->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P422->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P422" class="<?php echo $ivf_stimulation_chart->P422->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P422) ?>',1);"><div id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P422->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P422->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P422->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P423) == "") { ?>
		<th data-name="P423" class="<?php echo $ivf_stimulation_chart->P423->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P423->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P423" class="<?php echo $ivf_stimulation_chart->P423->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P423) ?>',1);"><div id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P423->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P423->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P423->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P424) == "") { ?>
		<th data-name="P424" class="<?php echo $ivf_stimulation_chart->P424->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P424->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P424" class="<?php echo $ivf_stimulation_chart->P424->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P424) ?>',1);"><div id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P424->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P424->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P424->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->P425) == "") { ?>
		<th data-name="P425" class="<?php echo $ivf_stimulation_chart->P425->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P425->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P425" class="<?php echo $ivf_stimulation_chart->P425->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->P425) ?>',1);"><div id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->P425->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->P425->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->P425->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt14) == "") { ?>
		<th data-name="USGRt14" class="<?php echo $ivf_stimulation_chart->USGRt14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt14" class="<?php echo $ivf_stimulation_chart->USGRt14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt14) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt15) == "") { ?>
		<th data-name="USGRt15" class="<?php echo $ivf_stimulation_chart->USGRt15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt15" class="<?php echo $ivf_stimulation_chart->USGRt15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt15) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt16) == "") { ?>
		<th data-name="USGRt16" class="<?php echo $ivf_stimulation_chart->USGRt16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt16" class="<?php echo $ivf_stimulation_chart->USGRt16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt16) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt17) == "") { ?>
		<th data-name="USGRt17" class="<?php echo $ivf_stimulation_chart->USGRt17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt17" class="<?php echo $ivf_stimulation_chart->USGRt17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt17) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt18) == "") { ?>
		<th data-name="USGRt18" class="<?php echo $ivf_stimulation_chart->USGRt18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt18" class="<?php echo $ivf_stimulation_chart->USGRt18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt18) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt19) == "") { ?>
		<th data-name="USGRt19" class="<?php echo $ivf_stimulation_chart->USGRt19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt19" class="<?php echo $ivf_stimulation_chart->USGRt19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt19) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt20) == "") { ?>
		<th data-name="USGRt20" class="<?php echo $ivf_stimulation_chart->USGRt20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt20" class="<?php echo $ivf_stimulation_chart->USGRt20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt20) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt21) == "") { ?>
		<th data-name="USGRt21" class="<?php echo $ivf_stimulation_chart->USGRt21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt21" class="<?php echo $ivf_stimulation_chart->USGRt21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt21) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt22) == "") { ?>
		<th data-name="USGRt22" class="<?php echo $ivf_stimulation_chart->USGRt22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt22" class="<?php echo $ivf_stimulation_chart->USGRt22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt22) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt23) == "") { ?>
		<th data-name="USGRt23" class="<?php echo $ivf_stimulation_chart->USGRt23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt23" class="<?php echo $ivf_stimulation_chart->USGRt23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt23) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt24) == "") { ?>
		<th data-name="USGRt24" class="<?php echo $ivf_stimulation_chart->USGRt24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt24" class="<?php echo $ivf_stimulation_chart->USGRt24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt24) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGRt25) == "") { ?>
		<th data-name="USGRt25" class="<?php echo $ivf_stimulation_chart->USGRt25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGRt25" class="<?php echo $ivf_stimulation_chart->USGRt25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGRt25) ?>',1);"><div id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGRt25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGRt25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGRt25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt14) == "") { ?>
		<th data-name="USGLt14" class="<?php echo $ivf_stimulation_chart->USGLt14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt14" class="<?php echo $ivf_stimulation_chart->USGLt14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt14) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt15) == "") { ?>
		<th data-name="USGLt15" class="<?php echo $ivf_stimulation_chart->USGLt15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt15" class="<?php echo $ivf_stimulation_chart->USGLt15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt15) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt16) == "") { ?>
		<th data-name="USGLt16" class="<?php echo $ivf_stimulation_chart->USGLt16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt16" class="<?php echo $ivf_stimulation_chart->USGLt16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt16) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt17) == "") { ?>
		<th data-name="USGLt17" class="<?php echo $ivf_stimulation_chart->USGLt17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt17" class="<?php echo $ivf_stimulation_chart->USGLt17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt17) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt18) == "") { ?>
		<th data-name="USGLt18" class="<?php echo $ivf_stimulation_chart->USGLt18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt18" class="<?php echo $ivf_stimulation_chart->USGLt18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt18) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt19) == "") { ?>
		<th data-name="USGLt19" class="<?php echo $ivf_stimulation_chart->USGLt19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt19" class="<?php echo $ivf_stimulation_chart->USGLt19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt19) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt20) == "") { ?>
		<th data-name="USGLt20" class="<?php echo $ivf_stimulation_chart->USGLt20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt20" class="<?php echo $ivf_stimulation_chart->USGLt20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt20) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt21) == "") { ?>
		<th data-name="USGLt21" class="<?php echo $ivf_stimulation_chart->USGLt21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt21" class="<?php echo $ivf_stimulation_chart->USGLt21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt21) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt22) == "") { ?>
		<th data-name="USGLt22" class="<?php echo $ivf_stimulation_chart->USGLt22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt22" class="<?php echo $ivf_stimulation_chart->USGLt22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt22) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt23) == "") { ?>
		<th data-name="USGLt23" class="<?php echo $ivf_stimulation_chart->USGLt23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt23" class="<?php echo $ivf_stimulation_chart->USGLt23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt23) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt24) == "") { ?>
		<th data-name="USGLt24" class="<?php echo $ivf_stimulation_chart->USGLt24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt24" class="<?php echo $ivf_stimulation_chart->USGLt24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt24) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->USGLt25) == "") { ?>
		<th data-name="USGLt25" class="<?php echo $ivf_stimulation_chart->USGLt25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USGLt25" class="<?php echo $ivf_stimulation_chart->USGLt25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->USGLt25) ?>',1);"><div id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->USGLt25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->USGLt25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->USGLt25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM14) == "") { ?>
		<th data-name="EM14" class="<?php echo $ivf_stimulation_chart->EM14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM14" class="<?php echo $ivf_stimulation_chart->EM14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM14) ?>',1);"><div id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM15) == "") { ?>
		<th data-name="EM15" class="<?php echo $ivf_stimulation_chart->EM15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM15" class="<?php echo $ivf_stimulation_chart->EM15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM15) ?>',1);"><div id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM16) == "") { ?>
		<th data-name="EM16" class="<?php echo $ivf_stimulation_chart->EM16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM16" class="<?php echo $ivf_stimulation_chart->EM16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM16) ?>',1);"><div id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM17) == "") { ?>
		<th data-name="EM17" class="<?php echo $ivf_stimulation_chart->EM17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM17" class="<?php echo $ivf_stimulation_chart->EM17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM17) ?>',1);"><div id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM18) == "") { ?>
		<th data-name="EM18" class="<?php echo $ivf_stimulation_chart->EM18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM18" class="<?php echo $ivf_stimulation_chart->EM18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM18) ?>',1);"><div id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM19) == "") { ?>
		<th data-name="EM19" class="<?php echo $ivf_stimulation_chart->EM19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM19" class="<?php echo $ivf_stimulation_chart->EM19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM19) ?>',1);"><div id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM20) == "") { ?>
		<th data-name="EM20" class="<?php echo $ivf_stimulation_chart->EM20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM20" class="<?php echo $ivf_stimulation_chart->EM20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM20) ?>',1);"><div id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM21) == "") { ?>
		<th data-name="EM21" class="<?php echo $ivf_stimulation_chart->EM21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM21" class="<?php echo $ivf_stimulation_chart->EM21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM21) ?>',1);"><div id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM22) == "") { ?>
		<th data-name="EM22" class="<?php echo $ivf_stimulation_chart->EM22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM22" class="<?php echo $ivf_stimulation_chart->EM22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM22) ?>',1);"><div id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM23) == "") { ?>
		<th data-name="EM23" class="<?php echo $ivf_stimulation_chart->EM23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM23" class="<?php echo $ivf_stimulation_chart->EM23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM23) ?>',1);"><div id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM24) == "") { ?>
		<th data-name="EM24" class="<?php echo $ivf_stimulation_chart->EM24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM24" class="<?php echo $ivf_stimulation_chart->EM24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM24) ?>',1);"><div id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EM25) == "") { ?>
		<th data-name="EM25" class="<?php echo $ivf_stimulation_chart->EM25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EM25" class="<?php echo $ivf_stimulation_chart->EM25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EM25) ?>',1);"><div id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EM25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EM25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EM25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others14) == "") { ?>
		<th data-name="Others14" class="<?php echo $ivf_stimulation_chart->Others14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others14" class="<?php echo $ivf_stimulation_chart->Others14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others14) ?>',1);"><div id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others15) == "") { ?>
		<th data-name="Others15" class="<?php echo $ivf_stimulation_chart->Others15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others15" class="<?php echo $ivf_stimulation_chart->Others15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others15) ?>',1);"><div id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others16) == "") { ?>
		<th data-name="Others16" class="<?php echo $ivf_stimulation_chart->Others16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others16" class="<?php echo $ivf_stimulation_chart->Others16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others16) ?>',1);"><div id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others17) == "") { ?>
		<th data-name="Others17" class="<?php echo $ivf_stimulation_chart->Others17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others17" class="<?php echo $ivf_stimulation_chart->Others17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others17) ?>',1);"><div id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others18) == "") { ?>
		<th data-name="Others18" class="<?php echo $ivf_stimulation_chart->Others18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others18" class="<?php echo $ivf_stimulation_chart->Others18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others18) ?>',1);"><div id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others19) == "") { ?>
		<th data-name="Others19" class="<?php echo $ivf_stimulation_chart->Others19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others19" class="<?php echo $ivf_stimulation_chart->Others19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others19) ?>',1);"><div id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others20) == "") { ?>
		<th data-name="Others20" class="<?php echo $ivf_stimulation_chart->Others20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others20" class="<?php echo $ivf_stimulation_chart->Others20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others20) ?>',1);"><div id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others21) == "") { ?>
		<th data-name="Others21" class="<?php echo $ivf_stimulation_chart->Others21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others21" class="<?php echo $ivf_stimulation_chart->Others21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others21) ?>',1);"><div id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others22) == "") { ?>
		<th data-name="Others22" class="<?php echo $ivf_stimulation_chart->Others22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others22" class="<?php echo $ivf_stimulation_chart->Others22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others22) ?>',1);"><div id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others23) == "") { ?>
		<th data-name="Others23" class="<?php echo $ivf_stimulation_chart->Others23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others23" class="<?php echo $ivf_stimulation_chart->Others23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others23) ?>',1);"><div id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others24) == "") { ?>
		<th data-name="Others24" class="<?php echo $ivf_stimulation_chart->Others24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others24" class="<?php echo $ivf_stimulation_chart->Others24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others24) ?>',1);"><div id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->Others25) == "") { ?>
		<th data-name="Others25" class="<?php echo $ivf_stimulation_chart->Others25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others25" class="<?php echo $ivf_stimulation_chart->Others25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->Others25) ?>',1);"><div id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->Others25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->Others25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->Others25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR14) == "") { ?>
		<th data-name="DR14" class="<?php echo $ivf_stimulation_chart->DR14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR14->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR14" class="<?php echo $ivf_stimulation_chart->DR14->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR14) ?>',1);"><div id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR14->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR14->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR14->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR15) == "") { ?>
		<th data-name="DR15" class="<?php echo $ivf_stimulation_chart->DR15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR15->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR15" class="<?php echo $ivf_stimulation_chart->DR15->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR15) ?>',1);"><div id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR15->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR15->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR15->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR16) == "") { ?>
		<th data-name="DR16" class="<?php echo $ivf_stimulation_chart->DR16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR16->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR16" class="<?php echo $ivf_stimulation_chart->DR16->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR16) ?>',1);"><div id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR16->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR16->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR16->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR17) == "") { ?>
		<th data-name="DR17" class="<?php echo $ivf_stimulation_chart->DR17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR17->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR17" class="<?php echo $ivf_stimulation_chart->DR17->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR17) ?>',1);"><div id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR17->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR17->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR17->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR18) == "") { ?>
		<th data-name="DR18" class="<?php echo $ivf_stimulation_chart->DR18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR18->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR18" class="<?php echo $ivf_stimulation_chart->DR18->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR18) ?>',1);"><div id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR18->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR18->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR18->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR19) == "") { ?>
		<th data-name="DR19" class="<?php echo $ivf_stimulation_chart->DR19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR19->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR19" class="<?php echo $ivf_stimulation_chart->DR19->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR19) ?>',1);"><div id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR19->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR19->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR19->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR20) == "") { ?>
		<th data-name="DR20" class="<?php echo $ivf_stimulation_chart->DR20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR20->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR20" class="<?php echo $ivf_stimulation_chart->DR20->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR20) ?>',1);"><div id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR20->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR20->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR20->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR21) == "") { ?>
		<th data-name="DR21" class="<?php echo $ivf_stimulation_chart->DR21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR21" class="<?php echo $ivf_stimulation_chart->DR21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR21) ?>',1);"><div id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR22) == "") { ?>
		<th data-name="DR22" class="<?php echo $ivf_stimulation_chart->DR22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR22->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR22" class="<?php echo $ivf_stimulation_chart->DR22->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR22) ?>',1);"><div id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR22->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR22->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR22->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR23) == "") { ?>
		<th data-name="DR23" class="<?php echo $ivf_stimulation_chart->DR23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR23->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR23" class="<?php echo $ivf_stimulation_chart->DR23->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR23) ?>',1);"><div id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR23->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR23->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR23->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR24) == "") { ?>
		<th data-name="DR24" class="<?php echo $ivf_stimulation_chart->DR24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR24->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR24" class="<?php echo $ivf_stimulation_chart->DR24->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR24) ?>',1);"><div id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR24->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR24->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR24->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DR25) == "") { ?>
		<th data-name="DR25" class="<?php echo $ivf_stimulation_chart->DR25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR25->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DR25" class="<?php echo $ivf_stimulation_chart->DR25->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DR25) ?>',1);"><div id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DR25->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DR25->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DR25->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E214) == "") { ?>
		<th data-name="E214" class="<?php echo $ivf_stimulation_chart->E214->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E214->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E214" class="<?php echo $ivf_stimulation_chart->E214->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E214) ?>',1);"><div id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E214->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E214->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E214->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E215) == "") { ?>
		<th data-name="E215" class="<?php echo $ivf_stimulation_chart->E215->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E215->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E215" class="<?php echo $ivf_stimulation_chart->E215->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E215) ?>',1);"><div id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E215->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E215->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E215->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E216) == "") { ?>
		<th data-name="E216" class="<?php echo $ivf_stimulation_chart->E216->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E216->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E216" class="<?php echo $ivf_stimulation_chart->E216->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E216) ?>',1);"><div id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E216->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E216->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E216->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E217) == "") { ?>
		<th data-name="E217" class="<?php echo $ivf_stimulation_chart->E217->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E217->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E217" class="<?php echo $ivf_stimulation_chart->E217->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E217) ?>',1);"><div id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E217->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E217->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E217->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E218) == "") { ?>
		<th data-name="E218" class="<?php echo $ivf_stimulation_chart->E218->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E218->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E218" class="<?php echo $ivf_stimulation_chart->E218->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E218) ?>',1);"><div id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E218->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E218->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E218->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E219) == "") { ?>
		<th data-name="E219" class="<?php echo $ivf_stimulation_chart->E219->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E219->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E219" class="<?php echo $ivf_stimulation_chart->E219->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E219) ?>',1);"><div id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E219->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E219->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E219->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E220) == "") { ?>
		<th data-name="E220" class="<?php echo $ivf_stimulation_chart->E220->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E220->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E220" class="<?php echo $ivf_stimulation_chart->E220->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E220) ?>',1);"><div id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E220->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E220->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E220->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E221) == "") { ?>
		<th data-name="E221" class="<?php echo $ivf_stimulation_chart->E221->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E221->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E221" class="<?php echo $ivf_stimulation_chart->E221->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E221) ?>',1);"><div id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E221->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E221->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E221->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E222) == "") { ?>
		<th data-name="E222" class="<?php echo $ivf_stimulation_chart->E222->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E222->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E222" class="<?php echo $ivf_stimulation_chart->E222->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E222) ?>',1);"><div id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E222->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E222->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E222->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E223) == "") { ?>
		<th data-name="E223" class="<?php echo $ivf_stimulation_chart->E223->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E223->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E223" class="<?php echo $ivf_stimulation_chart->E223->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E223) ?>',1);"><div id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E223->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E223->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E223->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E224) == "") { ?>
		<th data-name="E224" class="<?php echo $ivf_stimulation_chart->E224->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E224->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E224" class="<?php echo $ivf_stimulation_chart->E224->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E224) ?>',1);"><div id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E224->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E224->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E224->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->E225) == "") { ?>
		<th data-name="E225" class="<?php echo $ivf_stimulation_chart->E225->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E225->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E225" class="<?php echo $ivf_stimulation_chart->E225->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->E225) ?>',1);"><div id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->E225->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->E225->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->E225->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EEETTTDTE) == "") { ?>
		<th data-name="EEETTTDTE" class="<?php echo $ivf_stimulation_chart->EEETTTDTE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEETTTDTE" class="<?php echo $ivf_stimulation_chart->EEETTTDTE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EEETTTDTE) ?>',1);"><div id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EEETTTDTE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EEETTTDTE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->bhcgdate) == "") { ?>
		<th data-name="bhcgdate" class="<?php echo $ivf_stimulation_chart->bhcgdate->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bhcgdate" class="<?php echo $ivf_stimulation_chart->bhcgdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->bhcgdate) ?>',1);"><div id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->bhcgdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->bhcgdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TUBAL_PATENCY) == "") { ?>
		<th data-name="TUBAL_PATENCY" class="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TUBAL_PATENCY" class="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TUBAL_PATENCY) ?>',1);"><div id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TUBAL_PATENCY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TUBAL_PATENCY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->HSG) == "") { ?>
		<th data-name="HSG" class="<?php echo $ivf_stimulation_chart->HSG->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HSG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSG" class="<?php echo $ivf_stimulation_chart->HSG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->HSG) ?>',1);"><div id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->HSG->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->HSG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->HSG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->DHL) == "") { ?>
		<th data-name="DHL" class="<?php echo $ivf_stimulation_chart->DHL->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DHL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DHL" class="<?php echo $ivf_stimulation_chart->DHL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->DHL) ?>',1);"><div id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->DHL->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->DHL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->DHL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->UTERINE_PROBLEMS) == "") { ?>
		<th data-name="UTERINE_PROBLEMS" class="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UTERINE_PROBLEMS" class="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->UTERINE_PROBLEMS) ?>',1);"><div id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->UTERINE_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->W_COMORBIDS) == "") { ?>
		<th data-name="W_COMORBIDS" class="<?php echo $ivf_stimulation_chart->W_COMORBIDS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="W_COMORBIDS" class="<?php echo $ivf_stimulation_chart->W_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->W_COMORBIDS) ?>',1);"><div id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->W_COMORBIDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->W_COMORBIDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->H_COMORBIDS) == "") { ?>
		<th data-name="H_COMORBIDS" class="<?php echo $ivf_stimulation_chart->H_COMORBIDS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="H_COMORBIDS" class="<?php echo $ivf_stimulation_chart->H_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->H_COMORBIDS) ?>',1);"><div id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->H_COMORBIDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->H_COMORBIDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SEXUAL_DYSFUNCTION) == "") { ?>
		<th data-name="SEXUAL_DYSFUNCTION" class="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEXUAL_DYSFUNCTION" class="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SEXUAL_DYSFUNCTION) ?>',1);"><div id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->TABLETS) == "") { ?>
		<th data-name="TABLETS" class="<?php echo $ivf_stimulation_chart->TABLETS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TABLETS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TABLETS" class="<?php echo $ivf_stimulation_chart->TABLETS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->TABLETS) ?>',1);"><div id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->TABLETS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->TABLETS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->TABLETS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->FOLLICLE_STATUS) == "") { ?>
		<th data-name="FOLLICLE_STATUS" class="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FOLLICLE_STATUS" class="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->FOLLICLE_STATUS) ?>',1);"><div id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->FOLLICLE_STATUS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->NUMBER_OF_IUI) == "") { ?>
		<th data-name="NUMBER_OF_IUI" class="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NUMBER_OF_IUI" class="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->NUMBER_OF_IUI) ?>',1);"><div id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->NUMBER_OF_IUI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->PROCEDURE) == "") { ?>
		<th data-name="PROCEDURE" class="<?php echo $ivf_stimulation_chart->PROCEDURE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURE" class="<?php echo $ivf_stimulation_chart->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->PROCEDURE) ?>',1);"><div id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->PROCEDURE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->PROCEDURE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->LUTEAL_SUPPORT) == "") { ?>
		<th data-name="LUTEAL_SUPPORT" class="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LUTEAL_SUPPORT" class="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->LUTEAL_SUPPORT) ?>',1);"><div id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->LUTEAL_SUPPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS) ?>',1);"><div id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->ONGOING_PREG) == "") { ?>
		<th data-name="ONGOING_PREG" class="<?php echo $ivf_stimulation_chart->ONGOING_PREG->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ONGOING_PREG" class="<?php echo $ivf_stimulation_chart->ONGOING_PREG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->ONGOING_PREG) ?>',1);"><div id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->ONGOING_PREG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->ONGOING_PREG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
	<?php if ($ivf_stimulation_chart->sortUrl($ivf_stimulation_chart->EDD_Date) == "") { ?>
		<th data-name="EDD_Date" class="<?php echo $ivf_stimulation_chart->EDD_Date->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD_Date" class="<?php echo $ivf_stimulation_chart->EDD_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_chart->SortUrl($ivf_stimulation_chart->EDD_Date) ?>',1);"><div id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_chart->EDD_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_chart->EDD_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_stimulation_chart_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_stimulation_chart->ExportAll && $ivf_stimulation_chart->isExport()) {
	$ivf_stimulation_chart_list->StopRec = $ivf_stimulation_chart_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_stimulation_chart_list->TotalRecs > $ivf_stimulation_chart_list->StartRec + $ivf_stimulation_chart_list->DisplayRecs - 1)
		$ivf_stimulation_chart_list->StopRec = $ivf_stimulation_chart_list->StartRec + $ivf_stimulation_chart_list->DisplayRecs - 1;
	else
		$ivf_stimulation_chart_list->StopRec = $ivf_stimulation_chart_list->TotalRecs;
}
$ivf_stimulation_chart_list->RecCnt = $ivf_stimulation_chart_list->StartRec - 1;
if ($ivf_stimulation_chart_list->Recordset && !$ivf_stimulation_chart_list->Recordset->EOF) {
	$ivf_stimulation_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_stimulation_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_stimulation_chart_list->StartRec > 1)
		$ivf_stimulation_chart_list->Recordset->move($ivf_stimulation_chart_list->StartRec - 1);
} elseif (!$ivf_stimulation_chart->AllowAddDeleteRow && $ivf_stimulation_chart_list->StopRec == 0) {
	$ivf_stimulation_chart_list->StopRec = $ivf_stimulation_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_stimulation_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_stimulation_chart->resetAttributes();
$ivf_stimulation_chart_list->renderRow();
while ($ivf_stimulation_chart_list->RecCnt < $ivf_stimulation_chart_list->StopRec) {
	$ivf_stimulation_chart_list->RecCnt++;
	if ($ivf_stimulation_chart_list->RecCnt >= $ivf_stimulation_chart_list->StartRec) {
		$ivf_stimulation_chart_list->RowCnt++;

		// Set up key count
		$ivf_stimulation_chart_list->KeyCount = $ivf_stimulation_chart_list->RowIndex;

		// Init row class and style
		$ivf_stimulation_chart->resetAttributes();
		$ivf_stimulation_chart->CssClass = "";
		if ($ivf_stimulation_chart->isGridAdd()) {
		} else {
			$ivf_stimulation_chart_list->loadRowValues($ivf_stimulation_chart_list->Recordset); // Load row values
		}
		$ivf_stimulation_chart->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_stimulation_chart->RowAttrs = array_merge($ivf_stimulation_chart->RowAttrs, array('data-rowindex'=>$ivf_stimulation_chart_list->RowCnt, 'id'=>'r' . $ivf_stimulation_chart_list->RowCnt . '_ivf_stimulation_chart', 'data-rowtype'=>$ivf_stimulation_chart->RowType));

		// Render row
		$ivf_stimulation_chart_list->renderRow();

		// Render list options
		$ivf_stimulation_chart_list->renderListOptions();
?>
	<tr<?php echo $ivf_stimulation_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_stimulation_chart_list->ListOptions->render("body", "left", $ivf_stimulation_chart_list->RowCnt);
?>
	<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_stimulation_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_stimulation_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_stimulation_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_stimulation_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle">
<span<?php echo $ivf_stimulation_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
		<td data-name="FemaleFactor"<?php echo $ivf_stimulation_chart->FemaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor">
<span<?php echo $ivf_stimulation_chart->FemaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FemaleFactor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
		<td data-name="MaleFactor"<?php echo $ivf_stimulation_chart->MaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor">
<span<?php echo $ivf_stimulation_chart->MaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MaleFactor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
		<td data-name="Protocol"<?php echo $ivf_stimulation_chart->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol">
<span<?php echo $ivf_stimulation_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Protocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
		<td data-name="SemenFrozen"<?php echo $ivf_stimulation_chart->SemenFrozen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen">
<span<?php echo $ivf_stimulation_chart->SemenFrozen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SemenFrozen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<td data-name="A4ICSICycle"<?php echo $ivf_stimulation_chart->A4ICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle">
<span<?php echo $ivf_stimulation_chart->A4ICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<td data-name="TotalICSICycle"<?php echo $ivf_stimulation_chart->TotalICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle">
<span<?php echo $ivf_stimulation_chart->TotalICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<td data-name="TypeOfInfertility"<?php echo $ivf_stimulation_chart->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility">
<span<?php echo $ivf_stimulation_chart->TypeOfInfertility->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
		<td data-name="Duration"<?php echo $ivf_stimulation_chart->Duration->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration">
<span<?php echo $ivf_stimulation_chart->Duration->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $ivf_stimulation_chart->LMP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP">
<span<?php echo $ivf_stimulation_chart->LMP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
		<td data-name="RelevantHistory"<?php echo $ivf_stimulation_chart->RelevantHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory">
<span<?php echo $ivf_stimulation_chart->RelevantHistory->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RelevantHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
		<td data-name="IUICycles"<?php echo $ivf_stimulation_chart->IUICycles->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles">
<span<?php echo $ivf_stimulation_chart->IUICycles->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IUICycles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
		<td data-name="AFC"<?php echo $ivf_stimulation_chart->AFC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC">
<span<?php echo $ivf_stimulation_chart->AFC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AFC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
		<td data-name="AMH"<?php echo $ivf_stimulation_chart->AMH->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH">
<span<?php echo $ivf_stimulation_chart->AMH->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AMH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI"<?php echo $ivf_stimulation_chart->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI">
<span<?php echo $ivf_stimulation_chart->FBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI"<?php echo $ivf_stimulation_chart->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI">
<span<?php echo $ivf_stimulation_chart->MBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<td data-name="OvarianVolumeRT"<?php echo $ivf_stimulation_chart->OvarianVolumeRT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeRT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<td data-name="OvarianVolumeLT"<?php echo $ivf_stimulation_chart->OvarianVolumeLT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeLT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<td data-name="DAYSOFSTIMULATION"<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<td data-name="DOSEOFGONADOTROPINS"<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
		<td data-name="INJTYPE"<?php echo $ivf_stimulation_chart->INJTYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE">
<span<?php echo $ivf_stimulation_chart->INJTYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->INJTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<td data-name="ANTAGONISTDAYS"<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<td data-name="ANTAGONISTSTARTDAY"<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<td data-name="GROWTHHORMONE"<?php echo $ivf_stimulation_chart->GROWTHHORMONE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE">
<span<?php echo $ivf_stimulation_chart->GROWTHHORMONE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<td data-name="PRETREATMENT"<?php echo $ivf_stimulation_chart->PRETREATMENT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT">
<span<?php echo $ivf_stimulation_chart->PRETREATMENT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
		<td data-name="SerumP4"<?php echo $ivf_stimulation_chart->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4">
<span<?php echo $ivf_stimulation_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SerumP4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
		<td data-name="FORT"<?php echo $ivf_stimulation_chart->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT">
<span<?php echo $ivf_stimulation_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
		<td data-name="MedicalFactors"<?php echo $ivf_stimulation_chart->MedicalFactors->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors">
<span<?php echo $ivf_stimulation_chart->MedicalFactors->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MedicalFactors->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
		<td data-name="SCDate"<?php echo $ivf_stimulation_chart->SCDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate">
<span<?php echo $ivf_stimulation_chart->SCDate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SCDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<td data-name="OvarianSurgery"<?php echo $ivf_stimulation_chart->OvarianSurgery->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery">
<span<?php echo $ivf_stimulation_chart->OvarianSurgery->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<td data-name="PreProcedureOrder"<?php echo $ivf_stimulation_chart->PreProcedureOrder->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder">
<span<?php echo $ivf_stimulation_chart->PreProcedureOrder->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
		<td data-name="TRIGGERR"<?php echo $ivf_stimulation_chart->TRIGGERR->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR">
<span<?php echo $ivf_stimulation_chart->TRIGGERR->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<td data-name="TRIGGERDATE"<?php echo $ivf_stimulation_chart->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE">
<span<?php echo $ivf_stimulation_chart->TRIGGERDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<td data-name="ATHOMEorCLINIC"<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
		<td data-name="OPUDATE"<?php echo $ivf_stimulation_chart->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE">
<span<?php echo $ivf_stimulation_chart->OPUDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OPUDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<td data-name="ALLFREEZEINDICATION"<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
		<td data-name="ERA"<?php echo $ivf_stimulation_chart->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA">
<span<?php echo $ivf_stimulation_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ERA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
		<td data-name="PGTA"<?php echo $ivf_stimulation_chart->PGTA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA">
<span<?php echo $ivf_stimulation_chart->PGTA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGTA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
		<td data-name="PGD"<?php echo $ivf_stimulation_chart->PGD->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD">
<span<?php echo $ivf_stimulation_chart->PGD->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
		<td data-name="DATEOFET"<?php echo $ivf_stimulation_chart->DATEOFET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET">
<span<?php echo $ivf_stimulation_chart->DATEOFET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATEOFET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
		<td data-name="ET"<?php echo $ivf_stimulation_chart->ET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET">
<span<?php echo $ivf_stimulation_chart->ET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
		<td data-name="ESET"<?php echo $ivf_stimulation_chart->ESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET">
<span<?php echo $ivf_stimulation_chart->ESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ESET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
		<td data-name="DOET"<?php echo $ivf_stimulation_chart->DOET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET">
<span<?php echo $ivf_stimulation_chart->DOET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<td data-name="SEMENPREPARATION"<?php echo $ivf_stimulation_chart->SEMENPREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION">
<span<?php echo $ivf_stimulation_chart->SEMENPREPARATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
		<td data-name="REASONFORESET"<?php echo $ivf_stimulation_chart->REASONFORESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET">
<span<?php echo $ivf_stimulation_chart->REASONFORESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->REASONFORESET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<td data-name="Expectedoocytes"<?php echo $ivf_stimulation_chart->Expectedoocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes">
<span<?php echo $ivf_stimulation_chart->Expectedoocytes->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
		<td data-name="StChDate1"<?php echo $ivf_stimulation_chart->StChDate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1">
<span<?php echo $ivf_stimulation_chart->StChDate1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
		<td data-name="StChDate2"<?php echo $ivf_stimulation_chart->StChDate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2">
<span<?php echo $ivf_stimulation_chart->StChDate2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
		<td data-name="StChDate3"<?php echo $ivf_stimulation_chart->StChDate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3">
<span<?php echo $ivf_stimulation_chart->StChDate3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
		<td data-name="StChDate4"<?php echo $ivf_stimulation_chart->StChDate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4">
<span<?php echo $ivf_stimulation_chart->StChDate4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
		<td data-name="StChDate5"<?php echo $ivf_stimulation_chart->StChDate5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5">
<span<?php echo $ivf_stimulation_chart->StChDate5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
		<td data-name="StChDate6"<?php echo $ivf_stimulation_chart->StChDate6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6">
<span<?php echo $ivf_stimulation_chart->StChDate6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
		<td data-name="StChDate7"<?php echo $ivf_stimulation_chart->StChDate7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7">
<span<?php echo $ivf_stimulation_chart->StChDate7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
		<td data-name="StChDate8"<?php echo $ivf_stimulation_chart->StChDate8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8">
<span<?php echo $ivf_stimulation_chart->StChDate8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
		<td data-name="StChDate9"<?php echo $ivf_stimulation_chart->StChDate9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9">
<span<?php echo $ivf_stimulation_chart->StChDate9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
		<td data-name="StChDate10"<?php echo $ivf_stimulation_chart->StChDate10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10">
<span<?php echo $ivf_stimulation_chart->StChDate10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
		<td data-name="StChDate11"<?php echo $ivf_stimulation_chart->StChDate11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11">
<span<?php echo $ivf_stimulation_chart->StChDate11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
		<td data-name="StChDate12"<?php echo $ivf_stimulation_chart->StChDate12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12">
<span<?php echo $ivf_stimulation_chart->StChDate12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
		<td data-name="StChDate13"<?php echo $ivf_stimulation_chart->StChDate13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13">
<span<?php echo $ivf_stimulation_chart->StChDate13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
		<td data-name="CycleDay1"<?php echo $ivf_stimulation_chart->CycleDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1">
<span<?php echo $ivf_stimulation_chart->CycleDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
		<td data-name="CycleDay2"<?php echo $ivf_stimulation_chart->CycleDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2">
<span<?php echo $ivf_stimulation_chart->CycleDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
		<td data-name="CycleDay3"<?php echo $ivf_stimulation_chart->CycleDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3">
<span<?php echo $ivf_stimulation_chart->CycleDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
		<td data-name="CycleDay4"<?php echo $ivf_stimulation_chart->CycleDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4">
<span<?php echo $ivf_stimulation_chart->CycleDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
		<td data-name="CycleDay5"<?php echo $ivf_stimulation_chart->CycleDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5">
<span<?php echo $ivf_stimulation_chart->CycleDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
		<td data-name="CycleDay6"<?php echo $ivf_stimulation_chart->CycleDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6">
<span<?php echo $ivf_stimulation_chart->CycleDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
		<td data-name="CycleDay7"<?php echo $ivf_stimulation_chart->CycleDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7">
<span<?php echo $ivf_stimulation_chart->CycleDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
		<td data-name="CycleDay8"<?php echo $ivf_stimulation_chart->CycleDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8">
<span<?php echo $ivf_stimulation_chart->CycleDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
		<td data-name="CycleDay9"<?php echo $ivf_stimulation_chart->CycleDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9">
<span<?php echo $ivf_stimulation_chart->CycleDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
		<td data-name="CycleDay10"<?php echo $ivf_stimulation_chart->CycleDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10">
<span<?php echo $ivf_stimulation_chart->CycleDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
		<td data-name="CycleDay11"<?php echo $ivf_stimulation_chart->CycleDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11">
<span<?php echo $ivf_stimulation_chart->CycleDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
		<td data-name="CycleDay12"<?php echo $ivf_stimulation_chart->CycleDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12">
<span<?php echo $ivf_stimulation_chart->CycleDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
		<td data-name="CycleDay13"<?php echo $ivf_stimulation_chart->CycleDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13">
<span<?php echo $ivf_stimulation_chart->CycleDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
		<td data-name="StimulationDay1"<?php echo $ivf_stimulation_chart->StimulationDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1">
<span<?php echo $ivf_stimulation_chart->StimulationDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
		<td data-name="StimulationDay2"<?php echo $ivf_stimulation_chart->StimulationDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2">
<span<?php echo $ivf_stimulation_chart->StimulationDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
		<td data-name="StimulationDay3"<?php echo $ivf_stimulation_chart->StimulationDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3">
<span<?php echo $ivf_stimulation_chart->StimulationDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
		<td data-name="StimulationDay4"<?php echo $ivf_stimulation_chart->StimulationDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4">
<span<?php echo $ivf_stimulation_chart->StimulationDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
		<td data-name="StimulationDay5"<?php echo $ivf_stimulation_chart->StimulationDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5">
<span<?php echo $ivf_stimulation_chart->StimulationDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
		<td data-name="StimulationDay6"<?php echo $ivf_stimulation_chart->StimulationDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6">
<span<?php echo $ivf_stimulation_chart->StimulationDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
		<td data-name="StimulationDay7"<?php echo $ivf_stimulation_chart->StimulationDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7">
<span<?php echo $ivf_stimulation_chart->StimulationDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
		<td data-name="StimulationDay8"<?php echo $ivf_stimulation_chart->StimulationDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8">
<span<?php echo $ivf_stimulation_chart->StimulationDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
		<td data-name="StimulationDay9"<?php echo $ivf_stimulation_chart->StimulationDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9">
<span<?php echo $ivf_stimulation_chart->StimulationDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
		<td data-name="StimulationDay10"<?php echo $ivf_stimulation_chart->StimulationDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10">
<span<?php echo $ivf_stimulation_chart->StimulationDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
		<td data-name="StimulationDay11"<?php echo $ivf_stimulation_chart->StimulationDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11">
<span<?php echo $ivf_stimulation_chart->StimulationDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
		<td data-name="StimulationDay12"<?php echo $ivf_stimulation_chart->StimulationDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12">
<span<?php echo $ivf_stimulation_chart->StimulationDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
		<td data-name="StimulationDay13"<?php echo $ivf_stimulation_chart->StimulationDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13">
<span<?php echo $ivf_stimulation_chart->StimulationDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
		<td data-name="Tablet1"<?php echo $ivf_stimulation_chart->Tablet1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1">
<span<?php echo $ivf_stimulation_chart->Tablet1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
		<td data-name="Tablet2"<?php echo $ivf_stimulation_chart->Tablet2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2">
<span<?php echo $ivf_stimulation_chart->Tablet2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
		<td data-name="Tablet3"<?php echo $ivf_stimulation_chart->Tablet3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3">
<span<?php echo $ivf_stimulation_chart->Tablet3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
		<td data-name="Tablet4"<?php echo $ivf_stimulation_chart->Tablet4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4">
<span<?php echo $ivf_stimulation_chart->Tablet4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
		<td data-name="Tablet5"<?php echo $ivf_stimulation_chart->Tablet5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5">
<span<?php echo $ivf_stimulation_chart->Tablet5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
		<td data-name="Tablet6"<?php echo $ivf_stimulation_chart->Tablet6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6">
<span<?php echo $ivf_stimulation_chart->Tablet6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
		<td data-name="Tablet7"<?php echo $ivf_stimulation_chart->Tablet7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7">
<span<?php echo $ivf_stimulation_chart->Tablet7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
		<td data-name="Tablet8"<?php echo $ivf_stimulation_chart->Tablet8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8">
<span<?php echo $ivf_stimulation_chart->Tablet8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
		<td data-name="Tablet9"<?php echo $ivf_stimulation_chart->Tablet9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9">
<span<?php echo $ivf_stimulation_chart->Tablet9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
		<td data-name="Tablet10"<?php echo $ivf_stimulation_chart->Tablet10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10">
<span<?php echo $ivf_stimulation_chart->Tablet10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
		<td data-name="Tablet11"<?php echo $ivf_stimulation_chart->Tablet11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11">
<span<?php echo $ivf_stimulation_chart->Tablet11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
		<td data-name="Tablet12"<?php echo $ivf_stimulation_chart->Tablet12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12">
<span<?php echo $ivf_stimulation_chart->Tablet12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
		<td data-name="Tablet13"<?php echo $ivf_stimulation_chart->Tablet13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13">
<span<?php echo $ivf_stimulation_chart->Tablet13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
		<td data-name="RFSH1"<?php echo $ivf_stimulation_chart->RFSH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1">
<span<?php echo $ivf_stimulation_chart->RFSH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
		<td data-name="RFSH2"<?php echo $ivf_stimulation_chart->RFSH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2">
<span<?php echo $ivf_stimulation_chart->RFSH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
		<td data-name="RFSH3"<?php echo $ivf_stimulation_chart->RFSH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3">
<span<?php echo $ivf_stimulation_chart->RFSH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
		<td data-name="RFSH4"<?php echo $ivf_stimulation_chart->RFSH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4">
<span<?php echo $ivf_stimulation_chart->RFSH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
		<td data-name="RFSH5"<?php echo $ivf_stimulation_chart->RFSH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5">
<span<?php echo $ivf_stimulation_chart->RFSH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
		<td data-name="RFSH6"<?php echo $ivf_stimulation_chart->RFSH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6">
<span<?php echo $ivf_stimulation_chart->RFSH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
		<td data-name="RFSH7"<?php echo $ivf_stimulation_chart->RFSH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7">
<span<?php echo $ivf_stimulation_chart->RFSH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
		<td data-name="RFSH8"<?php echo $ivf_stimulation_chart->RFSH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8">
<span<?php echo $ivf_stimulation_chart->RFSH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
		<td data-name="RFSH9"<?php echo $ivf_stimulation_chart->RFSH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9">
<span<?php echo $ivf_stimulation_chart->RFSH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
		<td data-name="RFSH10"<?php echo $ivf_stimulation_chart->RFSH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10">
<span<?php echo $ivf_stimulation_chart->RFSH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
		<td data-name="RFSH11"<?php echo $ivf_stimulation_chart->RFSH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11">
<span<?php echo $ivf_stimulation_chart->RFSH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
		<td data-name="RFSH12"<?php echo $ivf_stimulation_chart->RFSH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12">
<span<?php echo $ivf_stimulation_chart->RFSH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
		<td data-name="RFSH13"<?php echo $ivf_stimulation_chart->RFSH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13">
<span<?php echo $ivf_stimulation_chart->RFSH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
		<td data-name="HMG1"<?php echo $ivf_stimulation_chart->HMG1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1">
<span<?php echo $ivf_stimulation_chart->HMG1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
		<td data-name="HMG2"<?php echo $ivf_stimulation_chart->HMG2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2">
<span<?php echo $ivf_stimulation_chart->HMG2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
		<td data-name="HMG3"<?php echo $ivf_stimulation_chart->HMG3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3">
<span<?php echo $ivf_stimulation_chart->HMG3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
		<td data-name="HMG4"<?php echo $ivf_stimulation_chart->HMG4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4">
<span<?php echo $ivf_stimulation_chart->HMG4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
		<td data-name="HMG5"<?php echo $ivf_stimulation_chart->HMG5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5">
<span<?php echo $ivf_stimulation_chart->HMG5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
		<td data-name="HMG6"<?php echo $ivf_stimulation_chart->HMG6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6">
<span<?php echo $ivf_stimulation_chart->HMG6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
		<td data-name="HMG7"<?php echo $ivf_stimulation_chart->HMG7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7">
<span<?php echo $ivf_stimulation_chart->HMG7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
		<td data-name="HMG8"<?php echo $ivf_stimulation_chart->HMG8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8">
<span<?php echo $ivf_stimulation_chart->HMG8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
		<td data-name="HMG9"<?php echo $ivf_stimulation_chart->HMG9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9">
<span<?php echo $ivf_stimulation_chart->HMG9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
		<td data-name="HMG10"<?php echo $ivf_stimulation_chart->HMG10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10">
<span<?php echo $ivf_stimulation_chart->HMG10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
		<td data-name="HMG11"<?php echo $ivf_stimulation_chart->HMG11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11">
<span<?php echo $ivf_stimulation_chart->HMG11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
		<td data-name="HMG12"<?php echo $ivf_stimulation_chart->HMG12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12">
<span<?php echo $ivf_stimulation_chart->HMG12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
		<td data-name="HMG13"<?php echo $ivf_stimulation_chart->HMG13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13">
<span<?php echo $ivf_stimulation_chart->HMG13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
		<td data-name="GnRH1"<?php echo $ivf_stimulation_chart->GnRH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1">
<span<?php echo $ivf_stimulation_chart->GnRH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
		<td data-name="GnRH2"<?php echo $ivf_stimulation_chart->GnRH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2">
<span<?php echo $ivf_stimulation_chart->GnRH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
		<td data-name="GnRH3"<?php echo $ivf_stimulation_chart->GnRH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3">
<span<?php echo $ivf_stimulation_chart->GnRH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
		<td data-name="GnRH4"<?php echo $ivf_stimulation_chart->GnRH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4">
<span<?php echo $ivf_stimulation_chart->GnRH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
		<td data-name="GnRH5"<?php echo $ivf_stimulation_chart->GnRH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5">
<span<?php echo $ivf_stimulation_chart->GnRH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
		<td data-name="GnRH6"<?php echo $ivf_stimulation_chart->GnRH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6">
<span<?php echo $ivf_stimulation_chart->GnRH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
		<td data-name="GnRH7"<?php echo $ivf_stimulation_chart->GnRH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7">
<span<?php echo $ivf_stimulation_chart->GnRH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
		<td data-name="GnRH8"<?php echo $ivf_stimulation_chart->GnRH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8">
<span<?php echo $ivf_stimulation_chart->GnRH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
		<td data-name="GnRH9"<?php echo $ivf_stimulation_chart->GnRH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9">
<span<?php echo $ivf_stimulation_chart->GnRH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
		<td data-name="GnRH10"<?php echo $ivf_stimulation_chart->GnRH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10">
<span<?php echo $ivf_stimulation_chart->GnRH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
		<td data-name="GnRH11"<?php echo $ivf_stimulation_chart->GnRH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11">
<span<?php echo $ivf_stimulation_chart->GnRH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
		<td data-name="GnRH12"<?php echo $ivf_stimulation_chart->GnRH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12">
<span<?php echo $ivf_stimulation_chart->GnRH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
		<td data-name="GnRH13"<?php echo $ivf_stimulation_chart->GnRH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13">
<span<?php echo $ivf_stimulation_chart->GnRH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
		<td data-name="E21"<?php echo $ivf_stimulation_chart->E21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21">
<span<?php echo $ivf_stimulation_chart->E21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
		<td data-name="E22"<?php echo $ivf_stimulation_chart->E22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22">
<span<?php echo $ivf_stimulation_chart->E22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
		<td data-name="E23"<?php echo $ivf_stimulation_chart->E23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23">
<span<?php echo $ivf_stimulation_chart->E23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
		<td data-name="E24"<?php echo $ivf_stimulation_chart->E24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24">
<span<?php echo $ivf_stimulation_chart->E24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
		<td data-name="E25"<?php echo $ivf_stimulation_chart->E25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25">
<span<?php echo $ivf_stimulation_chart->E25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
		<td data-name="E26"<?php echo $ivf_stimulation_chart->E26->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26">
<span<?php echo $ivf_stimulation_chart->E26->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E26->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
		<td data-name="E27"<?php echo $ivf_stimulation_chart->E27->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27">
<span<?php echo $ivf_stimulation_chart->E27->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E27->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
		<td data-name="E28"<?php echo $ivf_stimulation_chart->E28->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28">
<span<?php echo $ivf_stimulation_chart->E28->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E28->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
		<td data-name="E29"<?php echo $ivf_stimulation_chart->E29->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29">
<span<?php echo $ivf_stimulation_chart->E29->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
		<td data-name="E210"<?php echo $ivf_stimulation_chart->E210->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210">
<span<?php echo $ivf_stimulation_chart->E210->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E210->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
		<td data-name="E211"<?php echo $ivf_stimulation_chart->E211->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211">
<span<?php echo $ivf_stimulation_chart->E211->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E211->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
		<td data-name="E212"<?php echo $ivf_stimulation_chart->E212->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212">
<span<?php echo $ivf_stimulation_chart->E212->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E212->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
		<td data-name="E213"<?php echo $ivf_stimulation_chart->E213->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213">
<span<?php echo $ivf_stimulation_chart->E213->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E213->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
		<td data-name="P41"<?php echo $ivf_stimulation_chart->P41->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41">
<span<?php echo $ivf_stimulation_chart->P41->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P41->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
		<td data-name="P42"<?php echo $ivf_stimulation_chart->P42->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42">
<span<?php echo $ivf_stimulation_chart->P42->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P42->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
		<td data-name="P43"<?php echo $ivf_stimulation_chart->P43->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43">
<span<?php echo $ivf_stimulation_chart->P43->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P43->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
		<td data-name="P44"<?php echo $ivf_stimulation_chart->P44->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44">
<span<?php echo $ivf_stimulation_chart->P44->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P44->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
		<td data-name="P45"<?php echo $ivf_stimulation_chart->P45->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45">
<span<?php echo $ivf_stimulation_chart->P45->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P45->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
		<td data-name="P46"<?php echo $ivf_stimulation_chart->P46->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46">
<span<?php echo $ivf_stimulation_chart->P46->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P46->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
		<td data-name="P47"<?php echo $ivf_stimulation_chart->P47->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47">
<span<?php echo $ivf_stimulation_chart->P47->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P47->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
		<td data-name="P48"<?php echo $ivf_stimulation_chart->P48->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48">
<span<?php echo $ivf_stimulation_chart->P48->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P48->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
		<td data-name="P49"<?php echo $ivf_stimulation_chart->P49->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49">
<span<?php echo $ivf_stimulation_chart->P49->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P49->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
		<td data-name="P410"<?php echo $ivf_stimulation_chart->P410->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410">
<span<?php echo $ivf_stimulation_chart->P410->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P410->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
		<td data-name="P411"<?php echo $ivf_stimulation_chart->P411->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411">
<span<?php echo $ivf_stimulation_chart->P411->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P411->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
		<td data-name="P412"<?php echo $ivf_stimulation_chart->P412->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412">
<span<?php echo $ivf_stimulation_chart->P412->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P412->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
		<td data-name="P413"<?php echo $ivf_stimulation_chart->P413->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413">
<span<?php echo $ivf_stimulation_chart->P413->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P413->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
		<td data-name="USGRt1"<?php echo $ivf_stimulation_chart->USGRt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1">
<span<?php echo $ivf_stimulation_chart->USGRt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
		<td data-name="USGRt2"<?php echo $ivf_stimulation_chart->USGRt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2">
<span<?php echo $ivf_stimulation_chart->USGRt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
		<td data-name="USGRt3"<?php echo $ivf_stimulation_chart->USGRt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3">
<span<?php echo $ivf_stimulation_chart->USGRt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
		<td data-name="USGRt4"<?php echo $ivf_stimulation_chart->USGRt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4">
<span<?php echo $ivf_stimulation_chart->USGRt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
		<td data-name="USGRt5"<?php echo $ivf_stimulation_chart->USGRt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5">
<span<?php echo $ivf_stimulation_chart->USGRt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
		<td data-name="USGRt6"<?php echo $ivf_stimulation_chart->USGRt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6">
<span<?php echo $ivf_stimulation_chart->USGRt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
		<td data-name="USGRt7"<?php echo $ivf_stimulation_chart->USGRt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7">
<span<?php echo $ivf_stimulation_chart->USGRt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
		<td data-name="USGRt8"<?php echo $ivf_stimulation_chart->USGRt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8">
<span<?php echo $ivf_stimulation_chart->USGRt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
		<td data-name="USGRt9"<?php echo $ivf_stimulation_chart->USGRt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9">
<span<?php echo $ivf_stimulation_chart->USGRt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
		<td data-name="USGRt10"<?php echo $ivf_stimulation_chart->USGRt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10">
<span<?php echo $ivf_stimulation_chart->USGRt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
		<td data-name="USGRt11"<?php echo $ivf_stimulation_chart->USGRt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11">
<span<?php echo $ivf_stimulation_chart->USGRt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
		<td data-name="USGRt12"<?php echo $ivf_stimulation_chart->USGRt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12">
<span<?php echo $ivf_stimulation_chart->USGRt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
		<td data-name="USGRt13"<?php echo $ivf_stimulation_chart->USGRt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13">
<span<?php echo $ivf_stimulation_chart->USGRt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
		<td data-name="USGLt1"<?php echo $ivf_stimulation_chart->USGLt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1">
<span<?php echo $ivf_stimulation_chart->USGLt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
		<td data-name="USGLt2"<?php echo $ivf_stimulation_chart->USGLt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2">
<span<?php echo $ivf_stimulation_chart->USGLt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
		<td data-name="USGLt3"<?php echo $ivf_stimulation_chart->USGLt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3">
<span<?php echo $ivf_stimulation_chart->USGLt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
		<td data-name="USGLt4"<?php echo $ivf_stimulation_chart->USGLt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4">
<span<?php echo $ivf_stimulation_chart->USGLt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
		<td data-name="USGLt5"<?php echo $ivf_stimulation_chart->USGLt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5">
<span<?php echo $ivf_stimulation_chart->USGLt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
		<td data-name="USGLt6"<?php echo $ivf_stimulation_chart->USGLt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6">
<span<?php echo $ivf_stimulation_chart->USGLt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
		<td data-name="USGLt7"<?php echo $ivf_stimulation_chart->USGLt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7">
<span<?php echo $ivf_stimulation_chart->USGLt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
		<td data-name="USGLt8"<?php echo $ivf_stimulation_chart->USGLt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8">
<span<?php echo $ivf_stimulation_chart->USGLt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
		<td data-name="USGLt9"<?php echo $ivf_stimulation_chart->USGLt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9">
<span<?php echo $ivf_stimulation_chart->USGLt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
		<td data-name="USGLt10"<?php echo $ivf_stimulation_chart->USGLt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10">
<span<?php echo $ivf_stimulation_chart->USGLt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
		<td data-name="USGLt11"<?php echo $ivf_stimulation_chart->USGLt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11">
<span<?php echo $ivf_stimulation_chart->USGLt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
		<td data-name="USGLt12"<?php echo $ivf_stimulation_chart->USGLt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12">
<span<?php echo $ivf_stimulation_chart->USGLt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
		<td data-name="USGLt13"<?php echo $ivf_stimulation_chart->USGLt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13">
<span<?php echo $ivf_stimulation_chart->USGLt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
		<td data-name="EM1"<?php echo $ivf_stimulation_chart->EM1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1">
<span<?php echo $ivf_stimulation_chart->EM1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
		<td data-name="EM2"<?php echo $ivf_stimulation_chart->EM2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2">
<span<?php echo $ivf_stimulation_chart->EM2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
		<td data-name="EM3"<?php echo $ivf_stimulation_chart->EM3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3">
<span<?php echo $ivf_stimulation_chart->EM3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
		<td data-name="EM4"<?php echo $ivf_stimulation_chart->EM4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4">
<span<?php echo $ivf_stimulation_chart->EM4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
		<td data-name="EM5"<?php echo $ivf_stimulation_chart->EM5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5">
<span<?php echo $ivf_stimulation_chart->EM5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
		<td data-name="EM6"<?php echo $ivf_stimulation_chart->EM6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6">
<span<?php echo $ivf_stimulation_chart->EM6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
		<td data-name="EM7"<?php echo $ivf_stimulation_chart->EM7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7">
<span<?php echo $ivf_stimulation_chart->EM7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
		<td data-name="EM8"<?php echo $ivf_stimulation_chart->EM8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8">
<span<?php echo $ivf_stimulation_chart->EM8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
		<td data-name="EM9"<?php echo $ivf_stimulation_chart->EM9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9">
<span<?php echo $ivf_stimulation_chart->EM9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
		<td data-name="EM10"<?php echo $ivf_stimulation_chart->EM10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10">
<span<?php echo $ivf_stimulation_chart->EM10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
		<td data-name="EM11"<?php echo $ivf_stimulation_chart->EM11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11">
<span<?php echo $ivf_stimulation_chart->EM11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
		<td data-name="EM12"<?php echo $ivf_stimulation_chart->EM12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12">
<span<?php echo $ivf_stimulation_chart->EM12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
		<td data-name="EM13"<?php echo $ivf_stimulation_chart->EM13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13">
<span<?php echo $ivf_stimulation_chart->EM13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
		<td data-name="Others1"<?php echo $ivf_stimulation_chart->Others1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1">
<span<?php echo $ivf_stimulation_chart->Others1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
		<td data-name="Others2"<?php echo $ivf_stimulation_chart->Others2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2">
<span<?php echo $ivf_stimulation_chart->Others2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
		<td data-name="Others3"<?php echo $ivf_stimulation_chart->Others3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3">
<span<?php echo $ivf_stimulation_chart->Others3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
		<td data-name="Others4"<?php echo $ivf_stimulation_chart->Others4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4">
<span<?php echo $ivf_stimulation_chart->Others4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
		<td data-name="Others5"<?php echo $ivf_stimulation_chart->Others5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5">
<span<?php echo $ivf_stimulation_chart->Others5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
		<td data-name="Others6"<?php echo $ivf_stimulation_chart->Others6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6">
<span<?php echo $ivf_stimulation_chart->Others6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
		<td data-name="Others7"<?php echo $ivf_stimulation_chart->Others7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7">
<span<?php echo $ivf_stimulation_chart->Others7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
		<td data-name="Others8"<?php echo $ivf_stimulation_chart->Others8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8">
<span<?php echo $ivf_stimulation_chart->Others8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
		<td data-name="Others9"<?php echo $ivf_stimulation_chart->Others9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9">
<span<?php echo $ivf_stimulation_chart->Others9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
		<td data-name="Others10"<?php echo $ivf_stimulation_chart->Others10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10">
<span<?php echo $ivf_stimulation_chart->Others10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
		<td data-name="Others11"<?php echo $ivf_stimulation_chart->Others11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11">
<span<?php echo $ivf_stimulation_chart->Others11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
		<td data-name="Others12"<?php echo $ivf_stimulation_chart->Others12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12">
<span<?php echo $ivf_stimulation_chart->Others12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
		<td data-name="Others13"<?php echo $ivf_stimulation_chart->Others13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13">
<span<?php echo $ivf_stimulation_chart->Others13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
		<td data-name="DR1"<?php echo $ivf_stimulation_chart->DR1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1">
<span<?php echo $ivf_stimulation_chart->DR1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
		<td data-name="DR2"<?php echo $ivf_stimulation_chart->DR2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2">
<span<?php echo $ivf_stimulation_chart->DR2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
		<td data-name="DR3"<?php echo $ivf_stimulation_chart->DR3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3">
<span<?php echo $ivf_stimulation_chart->DR3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
		<td data-name="DR4"<?php echo $ivf_stimulation_chart->DR4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4">
<span<?php echo $ivf_stimulation_chart->DR4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
		<td data-name="DR5"<?php echo $ivf_stimulation_chart->DR5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5">
<span<?php echo $ivf_stimulation_chart->DR5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
		<td data-name="DR6"<?php echo $ivf_stimulation_chart->DR6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6">
<span<?php echo $ivf_stimulation_chart->DR6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
		<td data-name="DR7"<?php echo $ivf_stimulation_chart->DR7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7">
<span<?php echo $ivf_stimulation_chart->DR7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
		<td data-name="DR8"<?php echo $ivf_stimulation_chart->DR8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8">
<span<?php echo $ivf_stimulation_chart->DR8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
		<td data-name="DR9"<?php echo $ivf_stimulation_chart->DR9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9">
<span<?php echo $ivf_stimulation_chart->DR9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
		<td data-name="DR10"<?php echo $ivf_stimulation_chart->DR10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10">
<span<?php echo $ivf_stimulation_chart->DR10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
		<td data-name="DR11"<?php echo $ivf_stimulation_chart->DR11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11">
<span<?php echo $ivf_stimulation_chart->DR11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR11->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
		<td data-name="DR12"<?php echo $ivf_stimulation_chart->DR12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12">
<span<?php echo $ivf_stimulation_chart->DR12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR12->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
		<td data-name="DR13"<?php echo $ivf_stimulation_chart->DR13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13">
<span<?php echo $ivf_stimulation_chart->DR13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR13->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_stimulation_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
		<td data-name="Convert"<?php echo $ivf_stimulation_chart->Convert->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert">
<span<?php echo $ivf_stimulation_chart->Convert->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Convert->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_stimulation_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant">
<span<?php echo $ivf_stimulation_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_stimulation_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique">
<span<?php echo $ivf_stimulation_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART"<?php echo $ivf_stimulation_chart->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART">
<span<?php echo $ivf_stimulation_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy"<?php echo $ivf_stimulation_chart->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy">
<span<?php echo $ivf_stimulation_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td data-name="EndometrialScratching"<?php echo $ivf_stimulation_chart->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching">
<span<?php echo $ivf_stimulation_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation"<?php echo $ivf_stimulation_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation">
<span<?php echo $ivf_stimulation_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td data-name="CYCLETYPE"<?php echo $ivf_stimulation_chart->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE">
<span<?php echo $ivf_stimulation_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td data-name="HRTCYCLE"<?php echo $ivf_stimulation_chart->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE">
<span<?php echo $ivf_stimulation_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td data-name="OralEstrogenDosage"<?php echo $ivf_stimulation_chart->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage">
<span<?php echo $ivf_stimulation_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td data-name="VaginalEstrogen"<?php echo $ivf_stimulation_chart->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen">
<span<?php echo $ivf_stimulation_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
		<td data-name="GCSF"<?php echo $ivf_stimulation_chart->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF">
<span<?php echo $ivf_stimulation_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GCSF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td data-name="ActivatedPRP"<?php echo $ivf_stimulation_chart->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP">
<span<?php echo $ivf_stimulation_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
		<td data-name="UCLcm"<?php echo $ivf_stimulation_chart->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm">
<span<?php echo $ivf_stimulation_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UCLcm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<td data-name="DATOFEMBRYOTRANSFER"<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td data-name="DAYOFEMBRYOTRANSFER"<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td data-name="NOOFEMBRYOSTHAWED"<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td data-name="NOOFEMBRYOSTRANSFERRED"<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td data-name="DAYOFEMBRYOS"<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td data-name="CRYOPRESERVEDEMBRYOS"<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
		<td data-name="ViaAdmin"<?php echo $ivf_stimulation_chart->ViaAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin">
<span<?php echo $ivf_stimulation_chart->ViaAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaAdmin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<td data-name="ViaStartDateTime"<?php echo $ivf_stimulation_chart->ViaStartDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime">
<span<?php echo $ivf_stimulation_chart->ViaStartDateTime->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
		<td data-name="ViaDose"<?php echo $ivf_stimulation_chart->ViaDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose">
<span<?php echo $ivf_stimulation_chart->ViaDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaDose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
		<td data-name="AllFreeze"<?php echo $ivf_stimulation_chart->AllFreeze->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze">
<span<?php echo $ivf_stimulation_chart->AllFreeze->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AllFreeze->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<td data-name="TreatmentCancel"<?php echo $ivf_stimulation_chart->TreatmentCancel->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel">
<span<?php echo $ivf_stimulation_chart->TreatmentCancel->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<td data-name="ProgesteroneAdmin"<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin">
<span<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<td data-name="ProgesteroneStart"<?php echo $ivf_stimulation_chart->ProgesteroneStart->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart">
<span<?php echo $ivf_stimulation_chart->ProgesteroneStart->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<td data-name="ProgesteroneDose"<?php echo $ivf_stimulation_chart->ProgesteroneDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose">
<span<?php echo $ivf_stimulation_chart->ProgesteroneDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
		<td data-name="StChDate14"<?php echo $ivf_stimulation_chart->StChDate14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14">
<span<?php echo $ivf_stimulation_chart->StChDate14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
		<td data-name="StChDate15"<?php echo $ivf_stimulation_chart->StChDate15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15">
<span<?php echo $ivf_stimulation_chart->StChDate15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
		<td data-name="StChDate16"<?php echo $ivf_stimulation_chart->StChDate16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16">
<span<?php echo $ivf_stimulation_chart->StChDate16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
		<td data-name="StChDate17"<?php echo $ivf_stimulation_chart->StChDate17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17">
<span<?php echo $ivf_stimulation_chart->StChDate17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
		<td data-name="StChDate18"<?php echo $ivf_stimulation_chart->StChDate18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18">
<span<?php echo $ivf_stimulation_chart->StChDate18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
		<td data-name="StChDate19"<?php echo $ivf_stimulation_chart->StChDate19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19">
<span<?php echo $ivf_stimulation_chart->StChDate19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
		<td data-name="StChDate20"<?php echo $ivf_stimulation_chart->StChDate20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20">
<span<?php echo $ivf_stimulation_chart->StChDate20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
		<td data-name="StChDate21"<?php echo $ivf_stimulation_chart->StChDate21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21">
<span<?php echo $ivf_stimulation_chart->StChDate21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
		<td data-name="StChDate22"<?php echo $ivf_stimulation_chart->StChDate22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22">
<span<?php echo $ivf_stimulation_chart->StChDate22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
		<td data-name="StChDate23"<?php echo $ivf_stimulation_chart->StChDate23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23">
<span<?php echo $ivf_stimulation_chart->StChDate23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
		<td data-name="StChDate24"<?php echo $ivf_stimulation_chart->StChDate24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24">
<span<?php echo $ivf_stimulation_chart->StChDate24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
		<td data-name="StChDate25"<?php echo $ivf_stimulation_chart->StChDate25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25">
<span<?php echo $ivf_stimulation_chart->StChDate25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
		<td data-name="CycleDay14"<?php echo $ivf_stimulation_chart->CycleDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14">
<span<?php echo $ivf_stimulation_chart->CycleDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
		<td data-name="CycleDay15"<?php echo $ivf_stimulation_chart->CycleDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15">
<span<?php echo $ivf_stimulation_chart->CycleDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
		<td data-name="CycleDay16"<?php echo $ivf_stimulation_chart->CycleDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16">
<span<?php echo $ivf_stimulation_chart->CycleDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
		<td data-name="CycleDay17"<?php echo $ivf_stimulation_chart->CycleDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17">
<span<?php echo $ivf_stimulation_chart->CycleDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
		<td data-name="CycleDay18"<?php echo $ivf_stimulation_chart->CycleDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18">
<span<?php echo $ivf_stimulation_chart->CycleDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
		<td data-name="CycleDay19"<?php echo $ivf_stimulation_chart->CycleDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19">
<span<?php echo $ivf_stimulation_chart->CycleDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
		<td data-name="CycleDay20"<?php echo $ivf_stimulation_chart->CycleDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20">
<span<?php echo $ivf_stimulation_chart->CycleDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
		<td data-name="CycleDay21"<?php echo $ivf_stimulation_chart->CycleDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21">
<span<?php echo $ivf_stimulation_chart->CycleDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
		<td data-name="CycleDay22"<?php echo $ivf_stimulation_chart->CycleDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22">
<span<?php echo $ivf_stimulation_chart->CycleDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
		<td data-name="CycleDay23"<?php echo $ivf_stimulation_chart->CycleDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23">
<span<?php echo $ivf_stimulation_chart->CycleDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
		<td data-name="CycleDay24"<?php echo $ivf_stimulation_chart->CycleDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24">
<span<?php echo $ivf_stimulation_chart->CycleDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
		<td data-name="CycleDay25"<?php echo $ivf_stimulation_chart->CycleDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25">
<span<?php echo $ivf_stimulation_chart->CycleDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
		<td data-name="StimulationDay14"<?php echo $ivf_stimulation_chart->StimulationDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14">
<span<?php echo $ivf_stimulation_chart->StimulationDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
		<td data-name="StimulationDay15"<?php echo $ivf_stimulation_chart->StimulationDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15">
<span<?php echo $ivf_stimulation_chart->StimulationDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
		<td data-name="StimulationDay16"<?php echo $ivf_stimulation_chart->StimulationDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16">
<span<?php echo $ivf_stimulation_chart->StimulationDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
		<td data-name="StimulationDay17"<?php echo $ivf_stimulation_chart->StimulationDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17">
<span<?php echo $ivf_stimulation_chart->StimulationDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
		<td data-name="StimulationDay18"<?php echo $ivf_stimulation_chart->StimulationDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18">
<span<?php echo $ivf_stimulation_chart->StimulationDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
		<td data-name="StimulationDay19"<?php echo $ivf_stimulation_chart->StimulationDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19">
<span<?php echo $ivf_stimulation_chart->StimulationDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
		<td data-name="StimulationDay20"<?php echo $ivf_stimulation_chart->StimulationDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20">
<span<?php echo $ivf_stimulation_chart->StimulationDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
		<td data-name="StimulationDay21"<?php echo $ivf_stimulation_chart->StimulationDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21">
<span<?php echo $ivf_stimulation_chart->StimulationDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
		<td data-name="StimulationDay22"<?php echo $ivf_stimulation_chart->StimulationDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22">
<span<?php echo $ivf_stimulation_chart->StimulationDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
		<td data-name="StimulationDay23"<?php echo $ivf_stimulation_chart->StimulationDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23">
<span<?php echo $ivf_stimulation_chart->StimulationDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
		<td data-name="StimulationDay24"<?php echo $ivf_stimulation_chart->StimulationDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24">
<span<?php echo $ivf_stimulation_chart->StimulationDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
		<td data-name="StimulationDay25"<?php echo $ivf_stimulation_chart->StimulationDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25">
<span<?php echo $ivf_stimulation_chart->StimulationDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
		<td data-name="Tablet14"<?php echo $ivf_stimulation_chart->Tablet14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14">
<span<?php echo $ivf_stimulation_chart->Tablet14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
		<td data-name="Tablet15"<?php echo $ivf_stimulation_chart->Tablet15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15">
<span<?php echo $ivf_stimulation_chart->Tablet15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
		<td data-name="Tablet16"<?php echo $ivf_stimulation_chart->Tablet16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16">
<span<?php echo $ivf_stimulation_chart->Tablet16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
		<td data-name="Tablet17"<?php echo $ivf_stimulation_chart->Tablet17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17">
<span<?php echo $ivf_stimulation_chart->Tablet17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
		<td data-name="Tablet18"<?php echo $ivf_stimulation_chart->Tablet18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18">
<span<?php echo $ivf_stimulation_chart->Tablet18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
		<td data-name="Tablet19"<?php echo $ivf_stimulation_chart->Tablet19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19">
<span<?php echo $ivf_stimulation_chart->Tablet19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
		<td data-name="Tablet20"<?php echo $ivf_stimulation_chart->Tablet20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20">
<span<?php echo $ivf_stimulation_chart->Tablet20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
		<td data-name="Tablet21"<?php echo $ivf_stimulation_chart->Tablet21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21">
<span<?php echo $ivf_stimulation_chart->Tablet21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
		<td data-name="Tablet22"<?php echo $ivf_stimulation_chart->Tablet22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22">
<span<?php echo $ivf_stimulation_chart->Tablet22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
		<td data-name="Tablet23"<?php echo $ivf_stimulation_chart->Tablet23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23">
<span<?php echo $ivf_stimulation_chart->Tablet23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
		<td data-name="Tablet24"<?php echo $ivf_stimulation_chart->Tablet24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24">
<span<?php echo $ivf_stimulation_chart->Tablet24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
		<td data-name="Tablet25"<?php echo $ivf_stimulation_chart->Tablet25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25">
<span<?php echo $ivf_stimulation_chart->Tablet25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
		<td data-name="RFSH14"<?php echo $ivf_stimulation_chart->RFSH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14">
<span<?php echo $ivf_stimulation_chart->RFSH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
		<td data-name="RFSH15"<?php echo $ivf_stimulation_chart->RFSH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15">
<span<?php echo $ivf_stimulation_chart->RFSH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
		<td data-name="RFSH16"<?php echo $ivf_stimulation_chart->RFSH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16">
<span<?php echo $ivf_stimulation_chart->RFSH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
		<td data-name="RFSH17"<?php echo $ivf_stimulation_chart->RFSH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17">
<span<?php echo $ivf_stimulation_chart->RFSH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
		<td data-name="RFSH18"<?php echo $ivf_stimulation_chart->RFSH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18">
<span<?php echo $ivf_stimulation_chart->RFSH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
		<td data-name="RFSH19"<?php echo $ivf_stimulation_chart->RFSH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19">
<span<?php echo $ivf_stimulation_chart->RFSH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
		<td data-name="RFSH20"<?php echo $ivf_stimulation_chart->RFSH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20">
<span<?php echo $ivf_stimulation_chart->RFSH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
		<td data-name="RFSH21"<?php echo $ivf_stimulation_chart->RFSH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21">
<span<?php echo $ivf_stimulation_chart->RFSH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
		<td data-name="RFSH22"<?php echo $ivf_stimulation_chart->RFSH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22">
<span<?php echo $ivf_stimulation_chart->RFSH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
		<td data-name="RFSH23"<?php echo $ivf_stimulation_chart->RFSH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23">
<span<?php echo $ivf_stimulation_chart->RFSH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
		<td data-name="RFSH24"<?php echo $ivf_stimulation_chart->RFSH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24">
<span<?php echo $ivf_stimulation_chart->RFSH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
		<td data-name="RFSH25"<?php echo $ivf_stimulation_chart->RFSH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25">
<span<?php echo $ivf_stimulation_chart->RFSH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
		<td data-name="HMG14"<?php echo $ivf_stimulation_chart->HMG14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14">
<span<?php echo $ivf_stimulation_chart->HMG14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
		<td data-name="HMG15"<?php echo $ivf_stimulation_chart->HMG15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15">
<span<?php echo $ivf_stimulation_chart->HMG15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
		<td data-name="HMG16"<?php echo $ivf_stimulation_chart->HMG16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16">
<span<?php echo $ivf_stimulation_chart->HMG16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
		<td data-name="HMG17"<?php echo $ivf_stimulation_chart->HMG17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17">
<span<?php echo $ivf_stimulation_chart->HMG17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
		<td data-name="HMG18"<?php echo $ivf_stimulation_chart->HMG18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18">
<span<?php echo $ivf_stimulation_chart->HMG18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
		<td data-name="HMG19"<?php echo $ivf_stimulation_chart->HMG19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19">
<span<?php echo $ivf_stimulation_chart->HMG19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
		<td data-name="HMG20"<?php echo $ivf_stimulation_chart->HMG20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20">
<span<?php echo $ivf_stimulation_chart->HMG20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
		<td data-name="HMG21"<?php echo $ivf_stimulation_chart->HMG21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21">
<span<?php echo $ivf_stimulation_chart->HMG21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
		<td data-name="HMG22"<?php echo $ivf_stimulation_chart->HMG22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22">
<span<?php echo $ivf_stimulation_chart->HMG22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
		<td data-name="HMG23"<?php echo $ivf_stimulation_chart->HMG23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23">
<span<?php echo $ivf_stimulation_chart->HMG23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
		<td data-name="HMG24"<?php echo $ivf_stimulation_chart->HMG24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24">
<span<?php echo $ivf_stimulation_chart->HMG24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
		<td data-name="HMG25"<?php echo $ivf_stimulation_chart->HMG25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25">
<span<?php echo $ivf_stimulation_chart->HMG25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
		<td data-name="GnRH14"<?php echo $ivf_stimulation_chart->GnRH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14">
<span<?php echo $ivf_stimulation_chart->GnRH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
		<td data-name="GnRH15"<?php echo $ivf_stimulation_chart->GnRH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15">
<span<?php echo $ivf_stimulation_chart->GnRH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
		<td data-name="GnRH16"<?php echo $ivf_stimulation_chart->GnRH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16">
<span<?php echo $ivf_stimulation_chart->GnRH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
		<td data-name="GnRH17"<?php echo $ivf_stimulation_chart->GnRH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17">
<span<?php echo $ivf_stimulation_chart->GnRH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
		<td data-name="GnRH18"<?php echo $ivf_stimulation_chart->GnRH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18">
<span<?php echo $ivf_stimulation_chart->GnRH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
		<td data-name="GnRH19"<?php echo $ivf_stimulation_chart->GnRH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19">
<span<?php echo $ivf_stimulation_chart->GnRH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
		<td data-name="GnRH20"<?php echo $ivf_stimulation_chart->GnRH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20">
<span<?php echo $ivf_stimulation_chart->GnRH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
		<td data-name="GnRH21"<?php echo $ivf_stimulation_chart->GnRH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21">
<span<?php echo $ivf_stimulation_chart->GnRH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
		<td data-name="GnRH22"<?php echo $ivf_stimulation_chart->GnRH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22">
<span<?php echo $ivf_stimulation_chart->GnRH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
		<td data-name="GnRH23"<?php echo $ivf_stimulation_chart->GnRH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23">
<span<?php echo $ivf_stimulation_chart->GnRH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
		<td data-name="GnRH24"<?php echo $ivf_stimulation_chart->GnRH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24">
<span<?php echo $ivf_stimulation_chart->GnRH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
		<td data-name="GnRH25"<?php echo $ivf_stimulation_chart->GnRH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25">
<span<?php echo $ivf_stimulation_chart->GnRH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
		<td data-name="P414"<?php echo $ivf_stimulation_chart->P414->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414">
<span<?php echo $ivf_stimulation_chart->P414->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P414->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
		<td data-name="P415"<?php echo $ivf_stimulation_chart->P415->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415">
<span<?php echo $ivf_stimulation_chart->P415->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P415->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
		<td data-name="P416"<?php echo $ivf_stimulation_chart->P416->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416">
<span<?php echo $ivf_stimulation_chart->P416->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P416->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
		<td data-name="P417"<?php echo $ivf_stimulation_chart->P417->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417">
<span<?php echo $ivf_stimulation_chart->P417->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P417->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
		<td data-name="P418"<?php echo $ivf_stimulation_chart->P418->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418">
<span<?php echo $ivf_stimulation_chart->P418->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P418->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
		<td data-name="P419"<?php echo $ivf_stimulation_chart->P419->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419">
<span<?php echo $ivf_stimulation_chart->P419->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P419->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
		<td data-name="P420"<?php echo $ivf_stimulation_chart->P420->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420">
<span<?php echo $ivf_stimulation_chart->P420->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P420->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
		<td data-name="P421"<?php echo $ivf_stimulation_chart->P421->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421">
<span<?php echo $ivf_stimulation_chart->P421->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P421->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
		<td data-name="P422"<?php echo $ivf_stimulation_chart->P422->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422">
<span<?php echo $ivf_stimulation_chart->P422->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P422->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
		<td data-name="P423"<?php echo $ivf_stimulation_chart->P423->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423">
<span<?php echo $ivf_stimulation_chart->P423->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P423->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
		<td data-name="P424"<?php echo $ivf_stimulation_chart->P424->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424">
<span<?php echo $ivf_stimulation_chart->P424->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P424->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
		<td data-name="P425"<?php echo $ivf_stimulation_chart->P425->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425">
<span<?php echo $ivf_stimulation_chart->P425->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P425->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
		<td data-name="USGRt14"<?php echo $ivf_stimulation_chart->USGRt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14">
<span<?php echo $ivf_stimulation_chart->USGRt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
		<td data-name="USGRt15"<?php echo $ivf_stimulation_chart->USGRt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15">
<span<?php echo $ivf_stimulation_chart->USGRt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
		<td data-name="USGRt16"<?php echo $ivf_stimulation_chart->USGRt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16">
<span<?php echo $ivf_stimulation_chart->USGRt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
		<td data-name="USGRt17"<?php echo $ivf_stimulation_chart->USGRt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17">
<span<?php echo $ivf_stimulation_chart->USGRt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
		<td data-name="USGRt18"<?php echo $ivf_stimulation_chart->USGRt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18">
<span<?php echo $ivf_stimulation_chart->USGRt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
		<td data-name="USGRt19"<?php echo $ivf_stimulation_chart->USGRt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19">
<span<?php echo $ivf_stimulation_chart->USGRt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
		<td data-name="USGRt20"<?php echo $ivf_stimulation_chart->USGRt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20">
<span<?php echo $ivf_stimulation_chart->USGRt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
		<td data-name="USGRt21"<?php echo $ivf_stimulation_chart->USGRt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21">
<span<?php echo $ivf_stimulation_chart->USGRt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
		<td data-name="USGRt22"<?php echo $ivf_stimulation_chart->USGRt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22">
<span<?php echo $ivf_stimulation_chart->USGRt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
		<td data-name="USGRt23"<?php echo $ivf_stimulation_chart->USGRt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23">
<span<?php echo $ivf_stimulation_chart->USGRt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
		<td data-name="USGRt24"<?php echo $ivf_stimulation_chart->USGRt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24">
<span<?php echo $ivf_stimulation_chart->USGRt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
		<td data-name="USGRt25"<?php echo $ivf_stimulation_chart->USGRt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25">
<span<?php echo $ivf_stimulation_chart->USGRt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
		<td data-name="USGLt14"<?php echo $ivf_stimulation_chart->USGLt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14">
<span<?php echo $ivf_stimulation_chart->USGLt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
		<td data-name="USGLt15"<?php echo $ivf_stimulation_chart->USGLt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15">
<span<?php echo $ivf_stimulation_chart->USGLt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
		<td data-name="USGLt16"<?php echo $ivf_stimulation_chart->USGLt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16">
<span<?php echo $ivf_stimulation_chart->USGLt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
		<td data-name="USGLt17"<?php echo $ivf_stimulation_chart->USGLt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17">
<span<?php echo $ivf_stimulation_chart->USGLt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
		<td data-name="USGLt18"<?php echo $ivf_stimulation_chart->USGLt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18">
<span<?php echo $ivf_stimulation_chart->USGLt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
		<td data-name="USGLt19"<?php echo $ivf_stimulation_chart->USGLt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19">
<span<?php echo $ivf_stimulation_chart->USGLt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
		<td data-name="USGLt20"<?php echo $ivf_stimulation_chart->USGLt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20">
<span<?php echo $ivf_stimulation_chart->USGLt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
		<td data-name="USGLt21"<?php echo $ivf_stimulation_chart->USGLt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21">
<span<?php echo $ivf_stimulation_chart->USGLt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
		<td data-name="USGLt22"<?php echo $ivf_stimulation_chart->USGLt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22">
<span<?php echo $ivf_stimulation_chart->USGLt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
		<td data-name="USGLt23"<?php echo $ivf_stimulation_chart->USGLt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23">
<span<?php echo $ivf_stimulation_chart->USGLt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
		<td data-name="USGLt24"<?php echo $ivf_stimulation_chart->USGLt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24">
<span<?php echo $ivf_stimulation_chart->USGLt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
		<td data-name="USGLt25"<?php echo $ivf_stimulation_chart->USGLt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25">
<span<?php echo $ivf_stimulation_chart->USGLt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
		<td data-name="EM14"<?php echo $ivf_stimulation_chart->EM14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14">
<span<?php echo $ivf_stimulation_chart->EM14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
		<td data-name="EM15"<?php echo $ivf_stimulation_chart->EM15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15">
<span<?php echo $ivf_stimulation_chart->EM15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
		<td data-name="EM16"<?php echo $ivf_stimulation_chart->EM16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16">
<span<?php echo $ivf_stimulation_chart->EM16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
		<td data-name="EM17"<?php echo $ivf_stimulation_chart->EM17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17">
<span<?php echo $ivf_stimulation_chart->EM17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
		<td data-name="EM18"<?php echo $ivf_stimulation_chart->EM18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18">
<span<?php echo $ivf_stimulation_chart->EM18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
		<td data-name="EM19"<?php echo $ivf_stimulation_chart->EM19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19">
<span<?php echo $ivf_stimulation_chart->EM19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
		<td data-name="EM20"<?php echo $ivf_stimulation_chart->EM20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20">
<span<?php echo $ivf_stimulation_chart->EM20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
		<td data-name="EM21"<?php echo $ivf_stimulation_chart->EM21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21">
<span<?php echo $ivf_stimulation_chart->EM21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
		<td data-name="EM22"<?php echo $ivf_stimulation_chart->EM22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22">
<span<?php echo $ivf_stimulation_chart->EM22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
		<td data-name="EM23"<?php echo $ivf_stimulation_chart->EM23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23">
<span<?php echo $ivf_stimulation_chart->EM23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
		<td data-name="EM24"<?php echo $ivf_stimulation_chart->EM24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24">
<span<?php echo $ivf_stimulation_chart->EM24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
		<td data-name="EM25"<?php echo $ivf_stimulation_chart->EM25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25">
<span<?php echo $ivf_stimulation_chart->EM25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
		<td data-name="Others14"<?php echo $ivf_stimulation_chart->Others14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14">
<span<?php echo $ivf_stimulation_chart->Others14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
		<td data-name="Others15"<?php echo $ivf_stimulation_chart->Others15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15">
<span<?php echo $ivf_stimulation_chart->Others15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
		<td data-name="Others16"<?php echo $ivf_stimulation_chart->Others16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16">
<span<?php echo $ivf_stimulation_chart->Others16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
		<td data-name="Others17"<?php echo $ivf_stimulation_chart->Others17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17">
<span<?php echo $ivf_stimulation_chart->Others17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
		<td data-name="Others18"<?php echo $ivf_stimulation_chart->Others18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18">
<span<?php echo $ivf_stimulation_chart->Others18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
		<td data-name="Others19"<?php echo $ivf_stimulation_chart->Others19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19">
<span<?php echo $ivf_stimulation_chart->Others19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
		<td data-name="Others20"<?php echo $ivf_stimulation_chart->Others20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20">
<span<?php echo $ivf_stimulation_chart->Others20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
		<td data-name="Others21"<?php echo $ivf_stimulation_chart->Others21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21">
<span<?php echo $ivf_stimulation_chart->Others21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
		<td data-name="Others22"<?php echo $ivf_stimulation_chart->Others22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22">
<span<?php echo $ivf_stimulation_chart->Others22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
		<td data-name="Others23"<?php echo $ivf_stimulation_chart->Others23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23">
<span<?php echo $ivf_stimulation_chart->Others23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
		<td data-name="Others24"<?php echo $ivf_stimulation_chart->Others24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24">
<span<?php echo $ivf_stimulation_chart->Others24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
		<td data-name="Others25"<?php echo $ivf_stimulation_chart->Others25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25">
<span<?php echo $ivf_stimulation_chart->Others25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
		<td data-name="DR14"<?php echo $ivf_stimulation_chart->DR14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14">
<span<?php echo $ivf_stimulation_chart->DR14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR14->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
		<td data-name="DR15"<?php echo $ivf_stimulation_chart->DR15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15">
<span<?php echo $ivf_stimulation_chart->DR15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR15->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
		<td data-name="DR16"<?php echo $ivf_stimulation_chart->DR16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16">
<span<?php echo $ivf_stimulation_chart->DR16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR16->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
		<td data-name="DR17"<?php echo $ivf_stimulation_chart->DR17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17">
<span<?php echo $ivf_stimulation_chart->DR17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR17->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
		<td data-name="DR18"<?php echo $ivf_stimulation_chart->DR18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18">
<span<?php echo $ivf_stimulation_chart->DR18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR18->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
		<td data-name="DR19"<?php echo $ivf_stimulation_chart->DR19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19">
<span<?php echo $ivf_stimulation_chart->DR19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR19->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
		<td data-name="DR20"<?php echo $ivf_stimulation_chart->DR20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20">
<span<?php echo $ivf_stimulation_chart->DR20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR20->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
		<td data-name="DR21"<?php echo $ivf_stimulation_chart->DR21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21">
<span<?php echo $ivf_stimulation_chart->DR21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
		<td data-name="DR22"<?php echo $ivf_stimulation_chart->DR22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22">
<span<?php echo $ivf_stimulation_chart->DR22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR22->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
		<td data-name="DR23"<?php echo $ivf_stimulation_chart->DR23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23">
<span<?php echo $ivf_stimulation_chart->DR23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR23->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
		<td data-name="DR24"<?php echo $ivf_stimulation_chart->DR24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24">
<span<?php echo $ivf_stimulation_chart->DR24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR24->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
		<td data-name="DR25"<?php echo $ivf_stimulation_chart->DR25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25">
<span<?php echo $ivf_stimulation_chart->DR25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR25->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
		<td data-name="E214"<?php echo $ivf_stimulation_chart->E214->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214">
<span<?php echo $ivf_stimulation_chart->E214->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E214->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
		<td data-name="E215"<?php echo $ivf_stimulation_chart->E215->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215">
<span<?php echo $ivf_stimulation_chart->E215->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E215->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
		<td data-name="E216"<?php echo $ivf_stimulation_chart->E216->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216">
<span<?php echo $ivf_stimulation_chart->E216->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E216->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
		<td data-name="E217"<?php echo $ivf_stimulation_chart->E217->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217">
<span<?php echo $ivf_stimulation_chart->E217->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E217->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
		<td data-name="E218"<?php echo $ivf_stimulation_chart->E218->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218">
<span<?php echo $ivf_stimulation_chart->E218->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E218->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
		<td data-name="E219"<?php echo $ivf_stimulation_chart->E219->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219">
<span<?php echo $ivf_stimulation_chart->E219->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E219->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
		<td data-name="E220"<?php echo $ivf_stimulation_chart->E220->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220">
<span<?php echo $ivf_stimulation_chart->E220->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E220->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
		<td data-name="E221"<?php echo $ivf_stimulation_chart->E221->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221">
<span<?php echo $ivf_stimulation_chart->E221->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E221->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
		<td data-name="E222"<?php echo $ivf_stimulation_chart->E222->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222">
<span<?php echo $ivf_stimulation_chart->E222->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E222->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
		<td data-name="E223"<?php echo $ivf_stimulation_chart->E223->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223">
<span<?php echo $ivf_stimulation_chart->E223->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E223->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
		<td data-name="E224"<?php echo $ivf_stimulation_chart->E224->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224">
<span<?php echo $ivf_stimulation_chart->E224->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E224->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
		<td data-name="E225"<?php echo $ivf_stimulation_chart->E225->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225">
<span<?php echo $ivf_stimulation_chart->E225->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E225->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<td data-name="EEETTTDTE"<?php echo $ivf_stimulation_chart->EEETTTDTE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE">
<span<?php echo $ivf_stimulation_chart->EEETTTDTE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
		<td data-name="bhcgdate"<?php echo $ivf_stimulation_chart->bhcgdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate">
<span<?php echo $ivf_stimulation_chart->bhcgdate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->bhcgdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<td data-name="TUBAL_PATENCY"<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY">
<span<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
		<td data-name="HSG"<?php echo $ivf_stimulation_chart->HSG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG">
<span<?php echo $ivf_stimulation_chart->HSG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HSG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
		<td data-name="DHL"<?php echo $ivf_stimulation_chart->DHL->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL">
<span<?php echo $ivf_stimulation_chart->DHL->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DHL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<td data-name="UTERINE_PROBLEMS"<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<td data-name="W_COMORBIDS"<?php echo $ivf_stimulation_chart->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->W_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<td data-name="H_COMORBIDS"<?php echo $ivf_stimulation_chart->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->H_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<td data-name="SEXUAL_DYSFUNCTION"<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
		<td data-name="TABLETS"<?php echo $ivf_stimulation_chart->TABLETS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS">
<span<?php echo $ivf_stimulation_chart->TABLETS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TABLETS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<td data-name="FOLLICLE_STATUS"<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<td data-name="NUMBER_OF_IUI"<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
		<td data-name="PROCEDURE"<?php echo $ivf_stimulation_chart->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE">
<span<?php echo $ivf_stimulation_chart->PROCEDURE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<td data-name="LUTEAL_SUPPORT"<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<td data-name="SPECIFIC_MATERNAL_PROBLEMS"<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<td data-name="ONGOING_PREG"<?php echo $ivf_stimulation_chart->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG">
<span<?php echo $ivf_stimulation_chart->ONGOING_PREG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
		<td data-name="EDD_Date"<?php echo $ivf_stimulation_chart->EDD_Date->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_list->RowCnt ?>_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date">
<span<?php echo $ivf_stimulation_chart->EDD_Date->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EDD_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_stimulation_chart_list->ListOptions->render("body", "right", $ivf_stimulation_chart_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_stimulation_chart->isGridAdd())
		$ivf_stimulation_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_stimulation_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_stimulation_chart_list->Recordset)
	$ivf_stimulation_chart_list->Recordset->Close();
?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_stimulation_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_stimulation_chart_list->Pager)) $ivf_stimulation_chart_list->Pager = new NumericPager($ivf_stimulation_chart_list->StartRec, $ivf_stimulation_chart_list->DisplayRecs, $ivf_stimulation_chart_list->TotalRecs, $ivf_stimulation_chart_list->RecRange, $ivf_stimulation_chart_list->AutoHidePager) ?>
<?php if ($ivf_stimulation_chart_list->Pager->RecordCount > 0 && $ivf_stimulation_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_stimulation_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_stimulation_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_stimulation_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_chart_list->pageUrl() ?>start=<?php echo $ivf_stimulation_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_stimulation_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_list->TotalRecs > 0 && (!$ivf_stimulation_chart_list->AutoHidePageSizeSelector || $ivf_stimulation_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_stimulation_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_stimulation_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_stimulation_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_chart_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_stimulation_chart_list->TotalRecs == 0 && !$ivf_stimulation_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_stimulation_chart_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_stimulation_chart", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_chart_list->terminate();
?>