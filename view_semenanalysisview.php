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
$view_semenanalysis_view = new view_semenanalysis_view();

// Run the page
$view_semenanalysis_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_semenanalysisview = currentForm = new ew.Form("fview_semenanalysisview", "view");

// Form_CustomValidate event
fview_semenanalysisview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_semenanalysisview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_semenanalysisview.lists["x_RIDNo"] = <?php echo $view_semenanalysis_view->RIDNo->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_RIDNo"].options = <?php echo JsonEncode($view_semenanalysis_view->RIDNo->lookupOptions()) ?>;
fview_semenanalysisview.lists["x_PatientName"] = <?php echo $view_semenanalysis_view->PatientName->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_PatientName"].options = <?php echo JsonEncode($view_semenanalysis_view->PatientName->lookupOptions()) ?>;
fview_semenanalysisview.autoSuggests["x_PatientName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_semenanalysisview.lists["x_HusbandName"] = <?php echo $view_semenanalysis_view->HusbandName->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_HusbandName"].options = <?php echo JsonEncode($view_semenanalysis_view->HusbandName->lookupOptions()) ?>;
fview_semenanalysisview.lists["x_RequestSample"] = <?php echo $view_semenanalysis_view->RequestSample->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_RequestSample"].options = <?php echo JsonEncode($view_semenanalysis_view->RequestSample->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_CollectionType"] = <?php echo $view_semenanalysis_view->CollectionType->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_CollectionType"].options = <?php echo JsonEncode($view_semenanalysis_view->CollectionType->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_CollectionMethod"] = <?php echo $view_semenanalysis_view->CollectionMethod->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_CollectionMethod"].options = <?php echo JsonEncode($view_semenanalysis_view->CollectionMethod->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_Medicationused"] = <?php echo $view_semenanalysis_view->Medicationused->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_Medicationused"].options = <?php echo JsonEncode($view_semenanalysis_view->Medicationused->lookupOptions()) ?>;
fview_semenanalysisview.lists["x_DifficultiesinCollection"] = <?php echo $view_semenanalysis_view->DifficultiesinCollection->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($view_semenanalysis_view->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_Homogenosity"] = <?php echo $view_semenanalysis_view->Homogenosity->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_Homogenosity"].options = <?php echo JsonEncode($view_semenanalysis_view->Homogenosity->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_CompleteSample"] = <?php echo $view_semenanalysis_view->CompleteSample->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_CompleteSample"].options = <?php echo JsonEncode($view_semenanalysis_view->CompleteSample->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_SemenOrgin"] = <?php echo $view_semenanalysis_view->SemenOrgin->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_SemenOrgin"].options = <?php echo JsonEncode($view_semenanalysis_view->SemenOrgin->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_Donor"] = <?php echo $view_semenanalysis_view->Donor->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_Donor"].options = <?php echo JsonEncode($view_semenanalysis_view->Donor->lookupOptions()) ?>;
fview_semenanalysisview.lists["x_MACS[]"] = <?php echo $view_semenanalysis_view->MACS->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_MACS[]"].options = <?php echo JsonEncode($view_semenanalysis_view->MACS->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $view_semenanalysis_view->SPECIFIC_PROBLEMS->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($view_semenanalysis_view->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $view_semenanalysis_view->LIQUIFACTION_STORAGE->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($view_semenanalysis_view->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_IUI_PREP_METHOD"] = <?php echo $view_semenanalysis_view->IUI_PREP_METHOD->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($view_semenanalysis_view->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_TIME_FROM_TRIGGER"] = <?php echo $view_semenanalysis_view->TIME_FROM_TRIGGER->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($view_semenanalysis_view->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $view_semenanalysis_view->COLLECTION_TO_PREPARATION->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($view_semenanalysis_view->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
fview_semenanalysisview.lists["x_TIME_FROM_PREP_TO_INSEM"] = <?php echo $view_semenanalysis_view->TIME_FROM_PREP_TO_INSEM->Lookup->toClientList() ?>;
fview_semenanalysisview.lists["x_TIME_FROM_PREP_TO_INSEM"].options = <?php echo JsonEncode($view_semenanalysis_view->TIME_FROM_PREP_TO_INSEM->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_semenanalysis_view->ExportOptions->render("body") ?>
<?php $view_semenanalysis_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_semenanalysis_view->showPageHeader(); ?>
<?php
$view_semenanalysis_view->showMessage();
?>
<form name="fview_semenanalysisview" id="fview_semenanalysisview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_semenanalysis_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_semenanalysis_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="modal" value="<?php echo (int)$view_semenanalysis_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_semenanalysis->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_id"><script id="tpc_view_semenanalysis_id" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_semenanalysis->id->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_id" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_id">
<span<?php echo $view_semenanalysis->id->viewAttributes() ?>>
<?php echo $view_semenanalysis->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
	<tr id="r_PaID">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PaID"><script id="tpc_view_semenanalysis_PaID" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PaID->caption() ?></span></script></span></td>
		<td data-name="PaID"<?php echo $view_semenanalysis->PaID->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaID" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PaID">
<span<?php echo $view_semenanalysis->PaID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
	<tr id="r_PaName">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PaName"><script id="tpc_view_semenanalysis_PaName" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PaName->caption() ?></span></script></span></td>
		<td data-name="PaName"<?php echo $view_semenanalysis->PaName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaName" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PaName">
<span<?php echo $view_semenanalysis->PaName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
	<tr id="r_PaMobile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PaMobile"><script id="tpc_view_semenanalysis_PaMobile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PaMobile->caption() ?></span></script></span></td>
		<td data-name="PaMobile"<?php echo $view_semenanalysis->PaMobile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaMobile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PaMobile">
<span<?php echo $view_semenanalysis->PaMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaMobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerID"><script id="tpc_view_semenanalysis_PartnerID" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $view_semenanalysis->PartnerID->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerID" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PartnerID">
<span<?php echo $view_semenanalysis->PartnerID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerName"><script id="tpc_view_semenanalysis_PartnerName" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_semenanalysis->PartnerName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerName" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PartnerName">
<span<?php echo $view_semenanalysis->PartnerName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
	<tr id="r_PartnerMobile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerMobile"><script id="tpc_view_semenanalysis_PartnerMobile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PartnerMobile->caption() ?></span></script></span></td>
		<td data-name="PartnerMobile"<?php echo $view_semenanalysis->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerMobile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PartnerMobile">
<span<?php echo $view_semenanalysis->PartnerMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerMobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_RIDNo"><script id="tpc_view_semenanalysis_RIDNo" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->RIDNo->caption() ?></span></script></span></td>
		<td data-name="RIDNo"<?php echo $view_semenanalysis->RIDNo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RIDNo" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_RIDNo">
<span<?php echo $view_semenanalysis->RIDNo->viewAttributes() ?>>
<?php echo $view_semenanalysis->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PatientName"><script id="tpc_view_semenanalysis_PatientName" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_semenanalysis->PatientName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PatientName" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PatientName">
<span<?php echo $view_semenanalysis->PatientName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->HusbandName->Visible) { // HusbandName ?>
	<tr id="r_HusbandName">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_HusbandName"><script id="tpc_view_semenanalysis_HusbandName" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->HusbandName->caption() ?></span></script></span></td>
		<td data-name="HusbandName"<?php echo $view_semenanalysis->HusbandName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_HusbandName" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_HusbandName">
<span<?php echo $view_semenanalysis->HusbandName->viewAttributes() ?>>
<?php echo $view_semenanalysis->HusbandName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
	<tr id="r_RequestDr">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestDr"><script id="tpc_view_semenanalysis_RequestDr" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->RequestDr->caption() ?></span></script></span></td>
		<td data-name="RequestDr"<?php echo $view_semenanalysis->RequestDr->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RequestDr" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_RequestDr">
<span<?php echo $view_semenanalysis->RequestDr->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
	<tr id="r_CollectionDate">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionDate"><script id="tpc_view_semenanalysis_CollectionDate" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->CollectionDate->caption() ?></span></script></span></td>
		<td data-name="CollectionDate"<?php echo $view_semenanalysis->CollectionDate->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionDate" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_CollectionDate">
<span<?php echo $view_semenanalysis->CollectionDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->CollectionDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
	<tr id="r_ResultDate">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ResultDate"><script id="tpc_view_semenanalysis_ResultDate" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ResultDate->caption() ?></span></script></span></td>
		<td data-name="ResultDate"<?php echo $view_semenanalysis->ResultDate->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ResultDate" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ResultDate">
<span<?php echo $view_semenanalysis->ResultDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->ResultDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
	<tr id="r_RequestSample">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestSample"><script id="tpc_view_semenanalysis_RequestSample" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->RequestSample->caption() ?></span></script></span></td>
		<td data-name="RequestSample"<?php echo $view_semenanalysis->RequestSample->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RequestSample" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_RequestSample">
<span<?php echo $view_semenanalysis->RequestSample->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestSample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->CollectionType->Visible) { // CollectionType ?>
	<tr id="r_CollectionType">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionType"><script id="tpc_view_semenanalysis_CollectionType" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->CollectionType->caption() ?></span></script></span></td>
		<td data-name="CollectionType"<?php echo $view_semenanalysis->CollectionType->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionType" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_CollectionType">
<span<?php echo $view_semenanalysis->CollectionType->viewAttributes() ?>>
<?php echo $view_semenanalysis->CollectionType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->CollectionMethod->Visible) { // CollectionMethod ?>
	<tr id="r_CollectionMethod">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionMethod"><script id="tpc_view_semenanalysis_CollectionMethod" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->CollectionMethod->caption() ?></span></script></span></td>
		<td data-name="CollectionMethod"<?php echo $view_semenanalysis->CollectionMethod->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionMethod" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_CollectionMethod">
<span<?php echo $view_semenanalysis->CollectionMethod->viewAttributes() ?>>
<?php echo $view_semenanalysis->CollectionMethod->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Medicationused->Visible) { // Medicationused ?>
	<tr id="r_Medicationused">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Medicationused"><script id="tpc_view_semenanalysis_Medicationused" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Medicationused->caption() ?></span></script></span></td>
		<td data-name="Medicationused"<?php echo $view_semenanalysis->Medicationused->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Medicationused" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Medicationused">
<span<?php echo $view_semenanalysis->Medicationused->viewAttributes() ?>>
<?php echo $view_semenanalysis->Medicationused->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<tr id="r_DifficultiesinCollection">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_DifficultiesinCollection"><script id="tpc_view_semenanalysis_DifficultiesinCollection" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->DifficultiesinCollection->caption() ?></span></script></span></td>
		<td data-name="DifficultiesinCollection"<?php echo $view_semenanalysis->DifficultiesinCollection->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DifficultiesinCollection" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_DifficultiesinCollection">
<span<?php echo $view_semenanalysis->DifficultiesinCollection->viewAttributes() ?>>
<?php echo $view_semenanalysis->DifficultiesinCollection->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume"><script id="tpc_view_semenanalysis_Volume" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Volume->caption() ?></span></script></span></td>
		<td data-name="Volume"<?php echo $view_semenanalysis->Volume->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Volume">
<span<?php echo $view_semenanalysis->Volume->viewAttributes() ?>>
<?php echo $view_semenanalysis->Volume->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->pH->Visible) { // pH ?>
	<tr id="r_pH">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_pH"><script id="tpc_view_semenanalysis_pH" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->pH->caption() ?></span></script></span></td>
		<td data-name="pH"<?php echo $view_semenanalysis->pH->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_pH" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_pH">
<span<?php echo $view_semenanalysis->pH->viewAttributes() ?>>
<?php echo $view_semenanalysis->pH->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Timeofcollection->Visible) { // Timeofcollection ?>
	<tr id="r_Timeofcollection">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofcollection"><script id="tpc_view_semenanalysis_Timeofcollection" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Timeofcollection->caption() ?></span></script></span></td>
		<td data-name="Timeofcollection"<?php echo $view_semenanalysis->Timeofcollection->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Timeofcollection" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Timeofcollection">
<span<?php echo $view_semenanalysis->Timeofcollection->viewAttributes() ?>>
<?php echo $view_semenanalysis->Timeofcollection->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Timeofexamination->Visible) { // Timeofexamination ?>
	<tr id="r_Timeofexamination">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofexamination"><script id="tpc_view_semenanalysis_Timeofexamination" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Timeofexamination->caption() ?></span></script></span></td>
		<td data-name="Timeofexamination"<?php echo $view_semenanalysis->Timeofexamination->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Timeofexamination" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Timeofexamination">
<span<?php echo $view_semenanalysis->Timeofexamination->viewAttributes() ?>>
<?php echo $view_semenanalysis->Timeofexamination->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Concentration->Visible) { // Concentration ?>
	<tr id="r_Concentration">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration"><script id="tpc_view_semenanalysis_Concentration" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Concentration->caption() ?></span></script></span></td>
		<td data-name="Concentration"<?php echo $view_semenanalysis->Concentration->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Concentration">
<span<?php echo $view_semenanalysis->Concentration->viewAttributes() ?>>
<?php echo $view_semenanalysis->Concentration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Total->Visible) { // Total ?>
	<tr id="r_Total">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Total"><script id="tpc_view_semenanalysis_Total" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Total->caption() ?></span></script></span></td>
		<td data-name="Total"<?php echo $view_semenanalysis->Total->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Total">
<span<?php echo $view_semenanalysis->Total->viewAttributes() ?>>
<?php echo $view_semenanalysis->Total->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<tr id="r_ProgressiveMotility">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility"><script id="tpc_view_semenanalysis_ProgressiveMotility" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ProgressiveMotility->caption() ?></span></script></span></td>
		<td data-name="ProgressiveMotility"<?php echo $view_semenanalysis->ProgressiveMotility->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ProgressiveMotility">
<span<?php echo $view_semenanalysis->ProgressiveMotility->viewAttributes() ?>>
<?php echo $view_semenanalysis->ProgressiveMotility->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<tr id="r_NonProgrssiveMotile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile"><script id="tpc_view_semenanalysis_NonProgrssiveMotile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NonProgrssiveMotile->caption() ?></span></script></span></td>
		<td data-name="NonProgrssiveMotile"<?php echo $view_semenanalysis->NonProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NonProgrssiveMotile">
<span<?php echo $view_semenanalysis->NonProgrssiveMotile->viewAttributes() ?>>
<?php echo $view_semenanalysis->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Immotile->Visible) { // Immotile ?>
	<tr id="r_Immotile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile"><script id="tpc_view_semenanalysis_Immotile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Immotile->caption() ?></span></script></span></td>
		<td data-name="Immotile"<?php echo $view_semenanalysis->Immotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Immotile">
<span<?php echo $view_semenanalysis->Immotile->viewAttributes() ?>>
<?php echo $view_semenanalysis->Immotile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<tr id="r_TotalProgrssiveMotile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TotalProgrssiveMotile->caption() ?></span></script></span></td>
		<td data-name="TotalProgrssiveMotile"<?php echo $view_semenanalysis->TotalProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TotalProgrssiveMotile">
<span<?php echo $view_semenanalysis->TotalProgrssiveMotile->viewAttributes() ?>>
<?php echo $view_semenanalysis->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Appearance->Visible) { // Appearance ?>
	<tr id="r_Appearance">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Appearance"><script id="tpc_view_semenanalysis_Appearance" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Appearance->caption() ?></span></script></span></td>
		<td data-name="Appearance"<?php echo $view_semenanalysis->Appearance->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Appearance" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Appearance">
<span<?php echo $view_semenanalysis->Appearance->viewAttributes() ?>>
<?php echo $view_semenanalysis->Appearance->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Homogenosity->Visible) { // Homogenosity ?>
	<tr id="r_Homogenosity">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Homogenosity"><script id="tpc_view_semenanalysis_Homogenosity" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Homogenosity->caption() ?></span></script></span></td>
		<td data-name="Homogenosity"<?php echo $view_semenanalysis->Homogenosity->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Homogenosity" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Homogenosity">
<span<?php echo $view_semenanalysis->Homogenosity->viewAttributes() ?>>
<?php echo $view_semenanalysis->Homogenosity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->CompleteSample->Visible) { // CompleteSample ?>
	<tr id="r_CompleteSample">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_CompleteSample"><script id="tpc_view_semenanalysis_CompleteSample" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->CompleteSample->caption() ?></span></script></span></td>
		<td data-name="CompleteSample"<?php echo $view_semenanalysis->CompleteSample->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CompleteSample" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_CompleteSample">
<span<?php echo $view_semenanalysis->CompleteSample->viewAttributes() ?>>
<?php echo $view_semenanalysis->CompleteSample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<tr id="r_Liquefactiontime">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Liquefactiontime"><script id="tpc_view_semenanalysis_Liquefactiontime" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Liquefactiontime->caption() ?></span></script></span></td>
		<td data-name="Liquefactiontime"<?php echo $view_semenanalysis->Liquefactiontime->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Liquefactiontime" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Liquefactiontime">
<span<?php echo $view_semenanalysis->Liquefactiontime->viewAttributes() ?>>
<?php echo $view_semenanalysis->Liquefactiontime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Normal->Visible) { // Normal ?>
	<tr id="r_Normal">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Normal"><script id="tpc_view_semenanalysis_Normal" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Normal->caption() ?></span></script></span></td>
		<td data-name="Normal"<?php echo $view_semenanalysis->Normal->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Normal" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Normal">
<span<?php echo $view_semenanalysis->Normal->viewAttributes() ?>>
<?php echo $view_semenanalysis->Normal->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Abnormal->Visible) { // Abnormal ?>
	<tr id="r_Abnormal">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Abnormal"><script id="tpc_view_semenanalysis_Abnormal" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Abnormal->caption() ?></span></script></span></td>
		<td data-name="Abnormal"<?php echo $view_semenanalysis->Abnormal->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Abnormal" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Abnormal">
<span<?php echo $view_semenanalysis->Abnormal->viewAttributes() ?>>
<?php echo $view_semenanalysis->Abnormal->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Headdefects->Visible) { // Headdefects ?>
	<tr id="r_Headdefects">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Headdefects"><script id="tpc_view_semenanalysis_Headdefects" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Headdefects->caption() ?></span></script></span></td>
		<td data-name="Headdefects"<?php echo $view_semenanalysis->Headdefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Headdefects" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Headdefects">
<span<?php echo $view_semenanalysis->Headdefects->viewAttributes() ?>>
<?php echo $view_semenanalysis->Headdefects->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<tr id="r_MidpieceDefects">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_MidpieceDefects"><script id="tpc_view_semenanalysis_MidpieceDefects" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->MidpieceDefects->caption() ?></span></script></span></td>
		<td data-name="MidpieceDefects"<?php echo $view_semenanalysis->MidpieceDefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_MidpieceDefects" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_MidpieceDefects">
<span<?php echo $view_semenanalysis->MidpieceDefects->viewAttributes() ?>>
<?php echo $view_semenanalysis->MidpieceDefects->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TailDefects->Visible) { // TailDefects ?>
	<tr id="r_TailDefects">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TailDefects"><script id="tpc_view_semenanalysis_TailDefects" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TailDefects->caption() ?></span></script></span></td>
		<td data-name="TailDefects"<?php echo $view_semenanalysis->TailDefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TailDefects" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TailDefects">
<span<?php echo $view_semenanalysis->TailDefects->viewAttributes() ?>>
<?php echo $view_semenanalysis->TailDefects->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<tr id="r_NormalProgMotile">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NormalProgMotile"><script id="tpc_view_semenanalysis_NormalProgMotile" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NormalProgMotile->caption() ?></span></script></span></td>
		<td data-name="NormalProgMotile"<?php echo $view_semenanalysis->NormalProgMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NormalProgMotile" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NormalProgMotile">
<span<?php echo $view_semenanalysis->NormalProgMotile->viewAttributes() ?>>
<?php echo $view_semenanalysis->NormalProgMotile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ImmatureForms->Visible) { // ImmatureForms ?>
	<tr id="r_ImmatureForms">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ImmatureForms"><script id="tpc_view_semenanalysis_ImmatureForms" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ImmatureForms->caption() ?></span></script></span></td>
		<td data-name="ImmatureForms"<?php echo $view_semenanalysis->ImmatureForms->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ImmatureForms" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ImmatureForms">
<span<?php echo $view_semenanalysis->ImmatureForms->viewAttributes() ?>>
<?php echo $view_semenanalysis->ImmatureForms->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Leucocytes->Visible) { // Leucocytes ?>
	<tr id="r_Leucocytes">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Leucocytes"><script id="tpc_view_semenanalysis_Leucocytes" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Leucocytes->caption() ?></span></script></span></td>
		<td data-name="Leucocytes"<?php echo $view_semenanalysis->Leucocytes->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Leucocytes" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Leucocytes">
<span<?php echo $view_semenanalysis->Leucocytes->viewAttributes() ?>>
<?php echo $view_semenanalysis->Leucocytes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Agglutination->Visible) { // Agglutination ?>
	<tr id="r_Agglutination">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Agglutination"><script id="tpc_view_semenanalysis_Agglutination" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Agglutination->caption() ?></span></script></span></td>
		<td data-name="Agglutination"<?php echo $view_semenanalysis->Agglutination->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Agglutination" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Agglutination">
<span<?php echo $view_semenanalysis->Agglutination->viewAttributes() ?>>
<?php echo $view_semenanalysis->Agglutination->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Debris->Visible) { // Debris ?>
	<tr id="r_Debris">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Debris"><script id="tpc_view_semenanalysis_Debris" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Debris->caption() ?></span></script></span></td>
		<td data-name="Debris"<?php echo $view_semenanalysis->Debris->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Debris" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Debris">
<span<?php echo $view_semenanalysis->Debris->viewAttributes() ?>>
<?php echo $view_semenanalysis->Debris->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Diagnosis->Visible) { // Diagnosis ?>
	<tr id="r_Diagnosis">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Diagnosis"><script id="tpc_view_semenanalysis_Diagnosis" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Diagnosis->caption() ?></span></script></span></td>
		<td data-name="Diagnosis"<?php echo $view_semenanalysis->Diagnosis->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Diagnosis" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Diagnosis">
<span<?php echo $view_semenanalysis->Diagnosis->viewAttributes() ?>>
<?php echo $view_semenanalysis->Diagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Observations->Visible) { // Observations ?>
	<tr id="r_Observations">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Observations"><script id="tpc_view_semenanalysis_Observations" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Observations->caption() ?></span></script></span></td>
		<td data-name="Observations"<?php echo $view_semenanalysis->Observations->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Observations" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Observations">
<span<?php echo $view_semenanalysis->Observations->viewAttributes() ?>>
<?php echo $view_semenanalysis->Observations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Signature->Visible) { // Signature ?>
	<tr id="r_Signature">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Signature"><script id="tpc_view_semenanalysis_Signature" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Signature->caption() ?></span></script></span></td>
		<td data-name="Signature"<?php echo $view_semenanalysis->Signature->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Signature" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Signature">
<span<?php echo $view_semenanalysis->Signature->viewAttributes() ?>>
<?php echo $view_semenanalysis->Signature->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->SemenOrgin->Visible) { // SemenOrgin ?>
	<tr id="r_SemenOrgin">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_SemenOrgin"><script id="tpc_view_semenanalysis_SemenOrgin" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->SemenOrgin->caption() ?></span></script></span></td>
		<td data-name="SemenOrgin"<?php echo $view_semenanalysis->SemenOrgin->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_SemenOrgin" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_SemenOrgin">
<span<?php echo $view_semenanalysis->SemenOrgin->viewAttributes() ?>>
<?php echo $view_semenanalysis->SemenOrgin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Donor->Visible) { // Donor ?>
	<tr id="r_Donor">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Donor"><script id="tpc_view_semenanalysis_Donor" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Donor->caption() ?></span></script></span></td>
		<td data-name="Donor"<?php echo $view_semenanalysis->Donor->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Donor" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Donor">
<span<?php echo $view_semenanalysis->Donor->viewAttributes() ?>>
<?php echo $view_semenanalysis->Donor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<tr id="r_DonorBloodgroup">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_DonorBloodgroup"><script id="tpc_view_semenanalysis_DonorBloodgroup" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->DonorBloodgroup->caption() ?></span></script></span></td>
		<td data-name="DonorBloodgroup"<?php echo $view_semenanalysis->DonorBloodgroup->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DonorBloodgroup" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_DonorBloodgroup">
<span<?php echo $view_semenanalysis->DonorBloodgroup->viewAttributes() ?>>
<?php echo $view_semenanalysis->DonorBloodgroup->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Tank"><script id="tpc_view_semenanalysis_Tank" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Tank->caption() ?></span></script></span></td>
		<td data-name="Tank"<?php echo $view_semenanalysis->Tank->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Tank" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Tank">
<span<?php echo $view_semenanalysis->Tank->viewAttributes() ?>>
<?php echo $view_semenanalysis->Tank->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Location->Visible) { // Location ?>
	<tr id="r_Location">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Location"><script id="tpc_view_semenanalysis_Location" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Location->caption() ?></span></script></span></td>
		<td data-name="Location"<?php echo $view_semenanalysis->Location->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Location" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Location">
<span<?php echo $view_semenanalysis->Location->viewAttributes() ?>>
<?php echo $view_semenanalysis->Location->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Volume1->Visible) { // Volume1 ?>
	<tr id="r_Volume1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume1"><script id="tpc_view_semenanalysis_Volume1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Volume1->caption() ?></span></script></span></td>
		<td data-name="Volume1"<?php echo $view_semenanalysis->Volume1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Volume1">
<span<?php echo $view_semenanalysis->Volume1->viewAttributes() ?>>
<?php echo $view_semenanalysis->Volume1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Concentration1->Visible) { // Concentration1 ?>
	<tr id="r_Concentration1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration1"><script id="tpc_view_semenanalysis_Concentration1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Concentration1->caption() ?></span></script></span></td>
		<td data-name="Concentration1"<?php echo $view_semenanalysis->Concentration1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Concentration1">
<span<?php echo $view_semenanalysis->Concentration1->viewAttributes() ?>>
<?php echo $view_semenanalysis->Concentration1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Total1->Visible) { // Total1 ?>
	<tr id="r_Total1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Total1"><script id="tpc_view_semenanalysis_Total1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Total1->caption() ?></span></script></span></td>
		<td data-name="Total1"<?php echo $view_semenanalysis->Total1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Total1">
<span<?php echo $view_semenanalysis->Total1->viewAttributes() ?>>
<?php echo $view_semenanalysis->Total1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<tr id="r_ProgressiveMotility1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility1"><script id="tpc_view_semenanalysis_ProgressiveMotility1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ProgressiveMotility1->caption() ?></span></script></span></td>
		<td data-name="ProgressiveMotility1"<?php echo $view_semenanalysis->ProgressiveMotility1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ProgressiveMotility1">
<span<?php echo $view_semenanalysis->ProgressiveMotility1->viewAttributes() ?>>
<?php echo $view_semenanalysis->ProgressiveMotility1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<tr id="r_NonProgrssiveMotile1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile1"><script id="tpc_view_semenanalysis_NonProgrssiveMotile1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NonProgrssiveMotile1->caption() ?></span></script></span></td>
		<td data-name="NonProgrssiveMotile1"<?php echo $view_semenanalysis->NonProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NonProgrssiveMotile1">
<span<?php echo $view_semenanalysis->NonProgrssiveMotile1->viewAttributes() ?>>
<?php echo $view_semenanalysis->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Immotile1->Visible) { // Immotile1 ?>
	<tr id="r_Immotile1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile1"><script id="tpc_view_semenanalysis_Immotile1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Immotile1->caption() ?></span></script></span></td>
		<td data-name="Immotile1"<?php echo $view_semenanalysis->Immotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Immotile1">
<span<?php echo $view_semenanalysis->Immotile1->viewAttributes() ?>>
<?php echo $view_semenanalysis->Immotile1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<tr id="r_TotalProgrssiveMotile1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile1"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TotalProgrssiveMotile1->caption() ?></span></script></span></td>
		<td data-name="TotalProgrssiveMotile1"<?php echo $view_semenanalysis->TotalProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TotalProgrssiveMotile1">
<span<?php echo $view_semenanalysis->TotalProgrssiveMotile1->viewAttributes() ?>>
<?php echo $view_semenanalysis->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TidNo"><script id="tpc_view_semenanalysis_TidNo" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_semenanalysis->TidNo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TidNo" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TidNo">
<span<?php echo $view_semenanalysis->TidNo->viewAttributes() ?>>
<?php echo $view_semenanalysis->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Color->Visible) { // Color ?>
	<tr id="r_Color">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Color"><script id="tpc_view_semenanalysis_Color" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Color->caption() ?></span></script></span></td>
		<td data-name="Color"<?php echo $view_semenanalysis->Color->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Color" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Color">
<span<?php echo $view_semenanalysis->Color->viewAttributes() ?>>
<?php echo $view_semenanalysis->Color->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->DoneBy->Visible) { // DoneBy ?>
	<tr id="r_DoneBy">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_DoneBy"><script id="tpc_view_semenanalysis_DoneBy" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->DoneBy->caption() ?></span></script></span></td>
		<td data-name="DoneBy"<?php echo $view_semenanalysis->DoneBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DoneBy" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_DoneBy">
<span<?php echo $view_semenanalysis->DoneBy->viewAttributes() ?>>
<?php echo $view_semenanalysis->DoneBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Method"><script id="tpc_view_semenanalysis_Method" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Method->caption() ?></span></script></span></td>
		<td data-name="Method"<?php echo $view_semenanalysis->Method->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Method" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Method">
<span<?php echo $view_semenanalysis->Method->viewAttributes() ?>>
<?php echo $view_semenanalysis->Method->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Abstinence->Visible) { // Abstinence ?>
	<tr id="r_Abstinence">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Abstinence"><script id="tpc_view_semenanalysis_Abstinence" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Abstinence->caption() ?></span></script></span></td>
		<td data-name="Abstinence"<?php echo $view_semenanalysis->Abstinence->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Abstinence" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Abstinence">
<span<?php echo $view_semenanalysis->Abstinence->viewAttributes() ?>>
<?php echo $view_semenanalysis->Abstinence->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ProcessedBy->Visible) { // ProcessedBy ?>
	<tr id="r_ProcessedBy">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ProcessedBy"><script id="tpc_view_semenanalysis_ProcessedBy" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ProcessedBy->caption() ?></span></script></span></td>
		<td data-name="ProcessedBy"<?php echo $view_semenanalysis->ProcessedBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProcessedBy" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ProcessedBy">
<span<?php echo $view_semenanalysis->ProcessedBy->viewAttributes() ?>>
<?php echo $view_semenanalysis->ProcessedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->InseminationTime->Visible) { // InseminationTime ?>
	<tr id="r_InseminationTime">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationTime"><script id="tpc_view_semenanalysis_InseminationTime" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->InseminationTime->caption() ?></span></script></span></td>
		<td data-name="InseminationTime"<?php echo $view_semenanalysis->InseminationTime->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_InseminationTime" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_InseminationTime">
<span<?php echo $view_semenanalysis->InseminationTime->viewAttributes() ?>>
<?php echo $view_semenanalysis->InseminationTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->InseminationBy->Visible) { // InseminationBy ?>
	<tr id="r_InseminationBy">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationBy"><script id="tpc_view_semenanalysis_InseminationBy" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->InseminationBy->caption() ?></span></script></span></td>
		<td data-name="InseminationBy"<?php echo $view_semenanalysis->InseminationBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_InseminationBy" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_InseminationBy">
<span<?php echo $view_semenanalysis->InseminationBy->viewAttributes() ?>>
<?php echo $view_semenanalysis->InseminationBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Big->Visible) { // Big ?>
	<tr id="r_Big">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Big"><script id="tpc_view_semenanalysis_Big" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Big->caption() ?></span></script></span></td>
		<td data-name="Big"<?php echo $view_semenanalysis->Big->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Big" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Big">
<span<?php echo $view_semenanalysis->Big->viewAttributes() ?>>
<?php echo $view_semenanalysis->Big->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Medium->Visible) { // Medium ?>
	<tr id="r_Medium">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Medium"><script id="tpc_view_semenanalysis_Medium" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Medium->caption() ?></span></script></span></td>
		<td data-name="Medium"<?php echo $view_semenanalysis->Medium->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Medium" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Medium">
<span<?php echo $view_semenanalysis->Medium->viewAttributes() ?>>
<?php echo $view_semenanalysis->Medium->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Small->Visible) { // Small ?>
	<tr id="r_Small">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Small"><script id="tpc_view_semenanalysis_Small" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Small->caption() ?></span></script></span></td>
		<td data-name="Small"<?php echo $view_semenanalysis->Small->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Small" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Small">
<span<?php echo $view_semenanalysis->Small->viewAttributes() ?>>
<?php echo $view_semenanalysis->Small->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NoHalo->Visible) { // NoHalo ?>
	<tr id="r_NoHalo">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NoHalo"><script id="tpc_view_semenanalysis_NoHalo" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NoHalo->caption() ?></span></script></span></td>
		<td data-name="NoHalo"<?php echo $view_semenanalysis->NoHalo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NoHalo" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NoHalo">
<span<?php echo $view_semenanalysis->NoHalo->viewAttributes() ?>>
<?php echo $view_semenanalysis->NoHalo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Fragmented->Visible) { // Fragmented ?>
	<tr id="r_Fragmented">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Fragmented"><script id="tpc_view_semenanalysis_Fragmented" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Fragmented->caption() ?></span></script></span></td>
		<td data-name="Fragmented"<?php echo $view_semenanalysis->Fragmented->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Fragmented" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Fragmented">
<span<?php echo $view_semenanalysis->Fragmented->viewAttributes() ?>>
<?php echo $view_semenanalysis->Fragmented->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NonFragmented->Visible) { // NonFragmented ?>
	<tr id="r_NonFragmented">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NonFragmented"><script id="tpc_view_semenanalysis_NonFragmented" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NonFragmented->caption() ?></span></script></span></td>
		<td data-name="NonFragmented"<?php echo $view_semenanalysis->NonFragmented->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonFragmented" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NonFragmented">
<span<?php echo $view_semenanalysis->NonFragmented->viewAttributes() ?>>
<?php echo $view_semenanalysis->NonFragmented->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->DFI->Visible) { // DFI ?>
	<tr id="r_DFI">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_DFI"><script id="tpc_view_semenanalysis_DFI" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->DFI->caption() ?></span></script></span></td>
		<td data-name="DFI"<?php echo $view_semenanalysis->DFI->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DFI" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_DFI">
<span<?php echo $view_semenanalysis->DFI->viewAttributes() ?>>
<?php echo $view_semenanalysis->DFI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IsueBy->Visible) { // IsueBy ?>
	<tr id="r_IsueBy">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IsueBy"><script id="tpc_view_semenanalysis_IsueBy" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IsueBy->caption() ?></span></script></span></td>
		<td data-name="IsueBy"<?php echo $view_semenanalysis->IsueBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IsueBy" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IsueBy">
<span<?php echo $view_semenanalysis->IsueBy->viewAttributes() ?>>
<?php echo $view_semenanalysis->IsueBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Volume2->Visible) { // Volume2 ?>
	<tr id="r_Volume2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume2"><script id="tpc_view_semenanalysis_Volume2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Volume2->caption() ?></span></script></span></td>
		<td data-name="Volume2"<?php echo $view_semenanalysis->Volume2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Volume2">
<span<?php echo $view_semenanalysis->Volume2->viewAttributes() ?>>
<?php echo $view_semenanalysis->Volume2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Concentration2->Visible) { // Concentration2 ?>
	<tr id="r_Concentration2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration2"><script id="tpc_view_semenanalysis_Concentration2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Concentration2->caption() ?></span></script></span></td>
		<td data-name="Concentration2"<?php echo $view_semenanalysis->Concentration2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Concentration2">
<span<?php echo $view_semenanalysis->Concentration2->viewAttributes() ?>>
<?php echo $view_semenanalysis->Concentration2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Total2->Visible) { // Total2 ?>
	<tr id="r_Total2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Total2"><script id="tpc_view_semenanalysis_Total2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Total2->caption() ?></span></script></span></td>
		<td data-name="Total2"<?php echo $view_semenanalysis->Total2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Total2">
<span<?php echo $view_semenanalysis->Total2->viewAttributes() ?>>
<?php echo $view_semenanalysis->Total2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<tr id="r_ProgressiveMotility2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility2"><script id="tpc_view_semenanalysis_ProgressiveMotility2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->ProgressiveMotility2->caption() ?></span></script></span></td>
		<td data-name="ProgressiveMotility2"<?php echo $view_semenanalysis->ProgressiveMotility2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_ProgressiveMotility2">
<span<?php echo $view_semenanalysis->ProgressiveMotility2->viewAttributes() ?>>
<?php echo $view_semenanalysis->ProgressiveMotility2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<tr id="r_NonProgrssiveMotile2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile2"><script id="tpc_view_semenanalysis_NonProgrssiveMotile2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->NonProgrssiveMotile2->caption() ?></span></script></span></td>
		<td data-name="NonProgrssiveMotile2"<?php echo $view_semenanalysis->NonProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_NonProgrssiveMotile2">
<span<?php echo $view_semenanalysis->NonProgrssiveMotile2->viewAttributes() ?>>
<?php echo $view_semenanalysis->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->Immotile2->Visible) { // Immotile2 ?>
	<tr id="r_Immotile2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile2"><script id="tpc_view_semenanalysis_Immotile2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->Immotile2->caption() ?></span></script></span></td>
		<td data-name="Immotile2"<?php echo $view_semenanalysis->Immotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_Immotile2">
<span<?php echo $view_semenanalysis->Immotile2->viewAttributes() ?>>
<?php echo $view_semenanalysis->Immotile2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<tr id="r_TotalProgrssiveMotile2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile2"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TotalProgrssiveMotile2->caption() ?></span></script></span></td>
		<td data-name="TotalProgrssiveMotile2"<?php echo $view_semenanalysis->TotalProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TotalProgrssiveMotile2">
<span<?php echo $view_semenanalysis->TotalProgrssiveMotile2->viewAttributes() ?>>
<?php echo $view_semenanalysis->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IssuedBy->Visible) { // IssuedBy ?>
	<tr id="r_IssuedBy">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedBy"><script id="tpc_view_semenanalysis_IssuedBy" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IssuedBy->caption() ?></span></script></span></td>
		<td data-name="IssuedBy"<?php echo $view_semenanalysis->IssuedBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IssuedBy" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IssuedBy">
<span<?php echo $view_semenanalysis->IssuedBy->viewAttributes() ?>>
<?php echo $view_semenanalysis->IssuedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IssuedTo->Visible) { // IssuedTo ?>
	<tr id="r_IssuedTo">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedTo"><script id="tpc_view_semenanalysis_IssuedTo" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IssuedTo->caption() ?></span></script></span></td>
		<td data-name="IssuedTo"<?php echo $view_semenanalysis->IssuedTo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IssuedTo" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IssuedTo">
<span<?php echo $view_semenanalysis->IssuedTo->viewAttributes() ?>>
<?php echo $view_semenanalysis->IssuedTo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->MACS->Visible) { // MACS ?>
	<tr id="r_MACS">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_MACS"><script id="tpc_view_semenanalysis_MACS" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->MACS->caption() ?></span></script></span></td>
		<td data-name="MACS"<?php echo $view_semenanalysis->MACS->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_MACS" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_MACS">
<span<?php echo $view_semenanalysis->MACS->viewAttributes() ?>>
<?php echo $view_semenanalysis->MACS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<tr id="r_PREG_TEST_DATE">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE"><script id="tpc_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></span></script></span></td>
		<td data-name="PREG_TEST_DATE"<?php echo $view_semenanalysis->PREG_TEST_DATE->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_PREG_TEST_DATE">
<span<?php echo $view_semenanalysis->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $view_semenanalysis->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<tr id="r_SPECIFIC_PROBLEMS">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_SPECIFIC_PROBLEMS"><script id="tpc_view_semenanalysis_SPECIFIC_PROBLEMS" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->caption() ?></span></script></span></td>
		<td data-name="SPECIFIC_PROBLEMS"<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_SPECIFIC_PROBLEMS" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_SPECIFIC_PROBLEMS">
<span<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IMSC_1->Visible) { // IMSC_1 ?>
	<tr id="r_IMSC_1">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_1"><script id="tpc_view_semenanalysis_IMSC_1" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IMSC_1->caption() ?></span></script></span></td>
		<td data-name="IMSC_1"<?php echo $view_semenanalysis->IMSC_1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IMSC_1" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IMSC_1">
<span<?php echo $view_semenanalysis->IMSC_1->viewAttributes() ?>>
<?php echo $view_semenanalysis->IMSC_1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IMSC_2->Visible) { // IMSC_2 ?>
	<tr id="r_IMSC_2">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_2"><script id="tpc_view_semenanalysis_IMSC_2" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IMSC_2->caption() ?></span></script></span></td>
		<td data-name="IMSC_2"<?php echo $view_semenanalysis->IMSC_2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IMSC_2" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IMSC_2">
<span<?php echo $view_semenanalysis->IMSC_2->viewAttributes() ?>>
<?php echo $view_semenanalysis->IMSC_2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<tr id="r_LIQUIFACTION_STORAGE">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_LIQUIFACTION_STORAGE"><script id="tpc_view_semenanalysis_LIQUIFACTION_STORAGE" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->caption() ?></span></script></span></td>
		<td data-name="LIQUIFACTION_STORAGE"<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_LIQUIFACTION_STORAGE" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_LIQUIFACTION_STORAGE">
<span<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<tr id="r_IUI_PREP_METHOD">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_IUI_PREP_METHOD"><script id="tpc_view_semenanalysis_IUI_PREP_METHOD" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->IUI_PREP_METHOD->caption() ?></span></script></span></td>
		<td data-name="IUI_PREP_METHOD"<?php echo $view_semenanalysis->IUI_PREP_METHOD->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IUI_PREP_METHOD" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_IUI_PREP_METHOD">
<span<?php echo $view_semenanalysis->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $view_semenanalysis->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<tr id="r_TIME_FROM_TRIGGER">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_TRIGGER"><script id="tpc_view_semenanalysis_TIME_FROM_TRIGGER" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TIME_FROM_TRIGGER->caption() ?></span></script></span></td>
		<td data-name="TIME_FROM_TRIGGER"<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TIME_FROM_TRIGGER" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TIME_FROM_TRIGGER">
<span<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<tr id="r_COLLECTION_TO_PREPARATION">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION"><script id="tpc_view_semenanalysis_COLLECTION_TO_PREPARATION" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->caption() ?></span></script></span></td>
		<td data-name="COLLECTION_TO_PREPARATION"<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_COLLECTION_TO_PREPARATION" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_COLLECTION_TO_PREPARATION">
<span<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_semenanalysis->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<tr id="r_TIME_FROM_PREP_TO_INSEM">
		<td class="<?php echo $view_semenanalysis_view->TableLeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><script id="tpc_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" class="view_semenanalysisview" type="text/html"><span><?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->caption() ?></span></script></span></td>
		<td data-name="TIME_FROM_PREP_TO_INSEM"<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" class="view_semenanalysisview" type="text/html">
<span id="el_view_semenanalysis_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_semenanalysisview" class="ew-custom-template"></div>
<script id="tpm_view_semenanalysisview" type="text/html">
<div id="ct_view_semenanalysis_view"><style>
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
.card-body {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.ew-row {
	margin-bottom: 0.25rem;
}
.card {
	box-shadow: 0 0 1px rgba(0,0,0,0.125), 0 1px 3px rgba(0,0,0,0.2);
}
.border-right {
	border-right: 1px solid #ffc107 !important;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
hr {
	margin-top: 0.1rem;
	margin-bottom: 0.21rem;
	border-right-style: initial;
	border-bottom-style: initial;
	border-left-style: initial;
	border-right-color: initial;
	border-bottom-color: initial;
	border-left-color: initial;
	border-width: 4px 0px 0px;
	border-image: initial;
	border-top: 2px solid rgba(0, 0, 0, 1);
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;

//if( $showmaster=="ivf_treatment_plan")
//{

$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["RIDNo"] == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
	$results = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}

//}else{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//}
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
//$results1 = $dbhelper->ExecuteRows($sql);
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
//$results2 = $dbhelper->ExecuteRows($sql);

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
<div class="row">
<div id="viewPatientInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<div class="row">
<div class="col-sm-6 border-right">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
</div>
<div class="col-sm-6 border-right">
<?php
if($results[0]["CoupleID"] != '')
{
	echo '<font size="4" style="font-weight: bold;">Couple ID : </font>'. $results[0]["CoupleID"] ;
}
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
?>
</div>
</div>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-left">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div id="ViewPartnerInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-right">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
 <div style="width:100%">
<font face = "courier" >
<font size="4" style="font-weight: bold;">
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:35%">  Semen Orgin</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_SemenOrgin"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_SemenOrgin"/}} </td>
		</tr>
		<tr id="donorId">
			<td  style="width:35%">Donor</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Donor"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Donor"/}}</td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td  style="width:35%">Donor Bloodgroup</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_DonorBloodgroup"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_DonorBloodgroup"/}}</td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td  style="width:35%">Request Dr</td>
			<td>:</td>
			<td>{{:RequestDr}}</td>
		</tr>
	<tr>
			<td  style="width:35%">Collection Date</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_CollectionDate"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_CollectionDate"/}}</td>
		</tr>
		<tr>
			<td  style="width:35%">Result Date</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_ResultDate"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_ResultDate"/}}</td>
		</tr>
	</tbody>
</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<table class="ew-table"  style="width:100%">
	 <tbody>
		<tr>
			<td style="width:15%"></td>
			<td  style="width:70%"><h2 id="SemenHeading" align="center">Semen Analysis</h2></td>
			<td  style="width:15%;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Request</td>
			<td>:</td>
			<td id="el_view_semenanalysis_RequestSample"><?php echo $Page->RequestSample->CurrentValue ?></td>
		</tr>
		<tr>
			<td style="width:40%">Collection Type</td>
			<td>:</td>
			<td>{{:CollectionType}}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Method</td>
			<td>:</td>
			<td>{{:CollectionMethod}}</td>
		</tr>
	</tbody>	
</table>							   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Abstinence</td>
			<td style="width:5%">:</td>
			<td>{{:Abstinence}}</td>
		</tr>
		<tr>
			<td style="width:40%">Medication</td>
			<td style="width:5%">:</td>
			<td>{{:Medicationused}}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Difficulty</td>
			<td style="width:5%">:</td>
			<td>{{:DifficultiesinCollection}}</td>
		</tr>
	</tbody>	
</table>			
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Macroscopic Analysis</h3>
			</div>
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">p H</td>
		<td>:</td>
			<td>{{:pH}}>=7.2</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Collection</td>
		<td>:</td>
			<td>{{:Timeofcollection}}</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Examination</td>
		<td>:</td>
			<td>{{:Timeofexamination}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">Appearance</td>
		<td>:</td>
			<td >{{:Appearance}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Color</td>
		<td>:</td>
			<td >{{:Color}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Homogenosity</td>
		<td>:</td>
			<td >{{:Homogenosity}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Complete Sample</td>
		<td>:</td>
			<td >{{:CompleteSample}}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Liquefaction Time</td>
		<td>:</td>
			<td >{{:Liquefactiontime}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Microscopic Analysis</h3>
			</div>
			<div class="card-body">
<div id="idMacs">				
	{{include tmpl="#tpc_view_semenanalysis_MACS"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_MACS"/}}
</div>
<table id="capacitationTable" class="" align="left" border="0" cellpadding="1" cellspacing="1" style="width:60%">
<thead id="capacitationTableHead">
		<tr  style="background-color:#707B7C;color:white;" >
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>
			<td id="PostCapacitation">Post Capacitation</td>
			<td id="MaxCapacitation">MACS Capacitation</td>
			<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Volume"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Volume"/}}</td>
			<td id="Volume1">{{include tmpl="#tpc_view_semenanalysis_Volume1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Volume1"/}}</td>
			<td id="Volume2">{{include tmpl="#tpc_view_semenanalysis_Volume2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Volume2"/}}</td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Concentration"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Concentration"/}}</td>
			<td  id="Concentration1">{{include tmpl="#tpc_view_semenanalysis_Concentration1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Concentration1"/}}</td>
			<td  id="Concentration2">{{include tmpl="#tpc_view_semenanalysis_Concentration2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Concentration2"/}}</td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Total"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Total"/}}</td>
			<td  id="Total1">{{include tmpl="#tpc_view_semenanalysis_Total1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Total1"/}}</td>
			<td  id="Total2">{{include tmpl="#tpc_view_semenanalysis_Total2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Total2"/}}</td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_ProgressiveMotility"/}}</td>
			<td  id="ProgressiveMotility1">{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_ProgressiveMotility1"/}}</td>
			<td  id="ProgressiveMotility2">{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_ProgressiveMotility2"/}}</td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NonProgrssiveMotile"/}}</td>
			<td  id="NonProgrssiveMotile1">{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NonProgrssiveMotile1"/}}</td>
			<td  id="NonProgrssiveMotile2">{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NonProgrssiveMotile2"/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Immotile"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Immotile"/}}</td>
			<td  id="Immotile1">{{include tmpl="#tpc_view_semenanalysis_Immotile1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Immotile1"/}}</td>
			<td  id="Immotile2">{{include tmpl="#tpc_view_semenanalysis_Immotile2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Immotile2"/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Total motile sperm count (TMSC) </td>
				<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_TotalProgrssiveMotile"/}}</td>
			<td  id="TotalProgrssiveMotile1">{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile1"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_TotalProgrssiveMotile1"/}}</td>
			<td  id="TotalProgrssiveMotile2">{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile2"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_TotalProgrssiveMotile2"/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:{{include tmpl="#tpc_view_semenanalysis_Normal"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Normal"/}}%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_Abnormal"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Abnormal"/}}%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_Headdefects"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Headdefects"/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_MidpieceDefects"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_MidpieceDefects"/}}%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_TailDefects"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_TailDefects"/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_NormalProgMotile"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NormalProgMotile"/}}</td>
			<td>>=58%</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
	<tr>
			<td id="Method" style="font-size:120%;width:25%" >{{include tmpl="#tpc_view_semenanalysis_Method"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Method"/}}</td>
			<td ></td>
			<td ></td>
			<td style="width:10%">Agglutination</td>
			<td style="width:2%">:</td>
			<td >{{:Agglutination}}</td>
		</tr>
		<tr>
			<td style="width:25%">{{include tmpl="#tpc_view_semenanalysis_ImmatureForms"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_ImmatureForms"/}}</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td style="width:25%">{{include tmpl="#tpc_view_semenanalysis_Leucocytes"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Leucocytes"/}}</td>
			<td style="width:35%">%   <1 mill/ml or 20/field </td>
			<td ></td>
			<td >Debris</td>
			<td style="width:2%">:</td>
			<td >{{:Debris}}</td>
		</tr>
	</tbody>
</table>
</div>
	<br />
<div style="font-size:120%" class="ew-row">
{{include tmpl="#tpc_view_semenanalysis_Diagnosis"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Diagnosis"/}}
</div>
	<br />
<div class="ew-row">
{{include tmpl="#tpc_view_semenanalysis_Observations"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Observations"/}}
</div>
<?php
$tt = "ewbarcode.php?data=".$Page->PaID->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' >{{include tmpl="#tpc_view_semenanalysis_Big"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Big"/}}</td>
			<td id='Medium' >{{include tmpl="#tpc_view_semenanalysis_Medium"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Medium"/}}</td>
			<td id='Small'>{{include tmpl="#tpc_view_semenanalysis_Small"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Small"/}}</td>
			<td id='NoHalo'>{{include tmpl="#tpc_view_semenanalysis_NoHalo"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NoHalo"/}}</td>
		</tr>
		<tr>
			<td id='Fragmented'>{{include tmpl="#tpc_view_semenanalysis_Fragmented"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Fragmented"/}}</td>
			<td id='NonFragmented'>{{include tmpl="#tpc_view_semenanalysis_NonFragmented"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_NonFragmented"/}}</td>
			<td id='DFI'>{{include tmpl="#tpc_view_semenanalysis_DFI"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_DFI"/}}</td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'></td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'></td>
		</tr>
		<tr>
			<td style="width:10%;"><img src='<?php echo $tt; ?>' alt style="border: 0;"></td>
			<td id='IsueBy'>{{include tmpl="#tpc_view_semenanalysis_IsueBy"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_IsueBy"/}}</td>
			<td ></td>
			<td >Andrologist Signature</td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Tank"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Tank"/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_Location"/}}&nbsp;{{include tmpl="#tpx_view_semenanalysis_Location"/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div  style="font-size:100%">* Percentage respect to total number of abnormal spermatozoa </div>
<div style="font-size:80%">New reference values 17-01-2011: pursuant to the information published by WHO in the Human Reproduction Update, Vol.16, No3 pp. 231-245, 2010</div>
</div>
</script>
<script type="text/html" class="view_semenanalysisview_js">
		var OatientType = '<?php     $dbhelper = &DbHelper();
								$Tid = $_GET["id"] ;
								$showmaster = $_GET["showmaster"] ;
								$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
								$results = $dbhelper->ExecuteRows($sql); echo $results[0]["RIDNo"];  ?>';
	if(OatientType == '')
	{
		document.getElementById("ViewPartnerInfo").style.display = "none";
		document.getElementById("viewPatientInfo").className = "col-md-12";
	}
		 document.getElementById("idMacs").style.visibility = "hidden";
	var e = document.getElementById("x_RequestSample");

//	var RequestSample = e.options[e.selectedIndex].value;
	var TankLocation = document.getElementById("TankLocation");
	var RequestSample = document.getElementById('el_view_semenanalysis_RequestSample').innerText;
	document.getElementById('SemenHeading').innerText = 'Spermiogram';
				if(RequestSample == "Freezing")
				{
					document.getElementById('SemenHeading').innerText = 'Semen Freezing';
					TankLocation.style.visibility = "hidden";
					document.getElementById("idMacs").style.display = "none";
				}else{
					TankLocation.style.visibility = "hidden";
				}
				var capacitationTable = document.getElementById("capacitationTable");
				if(RequestSample == "IUI processing")
				{
				document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
					capacitationTable.style.width = "100%";
					 document.getElementById("Volume1").style.visibility = "visible";
					 document.getElementById("Concentration1").style.visibility = "visible";
					 document.getElementById("Total1").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("Immotile1").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("capacitationTableHead").style.visibility = "visible";
					 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
					document.getElementById("PostCapacitation").innerText = "Post Capacitation";
					document.getElementById("Big").style.visibility = "hidden";
					document.getElementById("Medium").style.visibility = "hidden";
					document.getElementById("Small").style.visibility = "hidden";
					document.getElementById("NoHalo").style.visibility = "hidden";
					document.getElementById("Fragmented").style.visibility = "hidden";
					document.getElementById("NonFragmented").style.visibility = "hidden";
					document.getElementById("DFI").style.visibility = "hidden";

					//document.getElementById("x_Volume1").style.width = "80px";
 				//	document.getElementById("x_Concentration1").style.width = "80px";
 				//	document.getElementById("x_Total1").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility1").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
 				//	document.getElementById("x_Immotile1").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";

document.getElementById("MaxCapacitation").style.visibility = "hidden";
						 document.getElementById("MaxCapacitation").style.width = "0px";
						var MACS = document.getElementById('el_view_semenanalysis_MACS').innerText;
				if(MACS == "MACS")
				{
				  					 					 document.getElementById("Volume2").style.visibility = "visible";
					 document.getElementById("Concentration2").style.visibility = "visible";
					 document.getElementById("Total2").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
					 document.getElementById("Immotile2").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
document.getElementById("MaxCapacitation").style.visibility = "visible";

					//document.getElementById("x_Volume2").style.width = "80px";
 				//	document.getElementById("x_Concentration2").style.width = "80px";
 				//	document.getElementById("x_Total2").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility2").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
 				//	document.getElementById("x_Immotile2").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";

				}else{

				//	 document.getElementById("x_Volume2").style.width = "0px";
				//	 document.getElementById("x_Concentration2").style.width = "0px";
				//	 document.getElementById("x_Total2").style.width = "0px";
				//	 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
				//	 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
				//	 document.getElementById("x_Immotile2").style.width = "0px";
				//	 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
										 document.getElementById("Volume2").style.display = "none";
					document.getElementById("Concentration2").style.display = "none";
					document.getElementById("Total2").style.display = "none";
					document.getElementById("ProgressiveMotility2").style.display = "none";
					document.getElementById("NonProgrssiveMotile2").style.display = "hidnoneden";
					document.getElementById("Immotile2").style.display = "none";
					document.getElementById("TotalProgrssiveMotile2").style.display = "none";
					 document.getElementById("idMacs").style.display = "none";
				}
				}else{
					capacitationTable.style.width = "60%";
					document.getElementById("idMacs").style.display = "none";
					 document.getElementById("Volume1").style.visibility = "hidden";
					 document.getElementById("Concentration1").style.visibility = "hidden";
					 document.getElementById("Total1").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("Immotile1").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("capacitationTableHead").style.visibility = "hidden";
					 document.getElementById("PreCapacitation").innerText = "";
					 document.getElementById("PostCapacitation").innerText = "";

					 //document.getElementById("x_Volume1").style.width = "0px";
					 //document.getElementById("x_Concentration1").style.width = "0px";
					 //document.getElementById("x_Total1").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility1").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Immotile1").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Volume2").style.width = "0px";
					 //document.getElementById("x_Concentration2").style.width = "0px";
					 //document.getElementById("x_Total2").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility2").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
					 //document.getElementById("x_Immotile2").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Big").style.visibility = "hidden";
					 document.getElementById("Medium").style.visibility = "hidden";
					 document.getElementById("Small").style.visibility = "hidden";
					 document.getElementById("NoHalo").style.visibility = "hidden";
					 document.getElementById("Fragmented").style.visibility = "hidden";
					 document.getElementById("NonFragmented").style.visibility = "hidden";
					 document.getElementById("DFI").style.visibility = "hidden";
					 document.getElementById("InseminationTime").style.visibility = "hidden";
					 document.getElementById("InseminationBy").style.visibility = "hidden";
					 document.getElementById("IsueBy").style.visibility = "hidden";
	}
	if (RequestSample == "DFI") {
		document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
		document.getElementById("Big").style.visibility = "visible";
		document.getElementById("Medium").style.visibility = "visible";
		document.getElementById("Small").style.visibility = "visible";
		document.getElementById("NoHalo").style.visibility = "visible";
		document.getElementById("Fragmented").style.visibility = "visible";
		document.getElementById("NonFragmented").style.visibility = "visible";
		document.getElementById("DFI").style.visibility = "visible";
		document.getElementById("idMacs").style.display = "none";
	}
					var e = document.getElementById("x_SemenOrgin");

				//	var SemenOrgin = e.options[e.selectedIndex].value;
				var donorId = document.getElementById("donorId");
	var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
	var SemenOrgin = document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;
				if(SemenOrgin == "Donor")
				{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "visible";
				}else{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "hidden";
				}
				if(capacitationTable.style.width == "60%")
				{
					document.getElementById("capacitationTableHead").style.display="none";
				}
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_semenanalysis->Rows) ?> };
ew.applyTemplate("tpd_view_semenanalysisview", "tpm_view_semenanalysisview", "view_semenanalysisview", "<?php echo $view_semenanalysis->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_semenanalysisview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_semenanalysis_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");
 //document.getElementById("x_pH").style.width = "80px";
 //document.getElementById("x_Volume").style.width = "80px";
 //document.getElementById("x_Concentration").style.width = "80px";
 //document.getElementById("x_Total").style.width = "80px";
 //document.getElementById("x_ProgressiveMotility").style.width = "80px";
 //document.getElementById("x_NonProgrssiveMotile").style.width = "80px";
 //document.getElementById("x_Immotile").style.width = "80px";
 //document.getElementById("x_TotalProgrssiveMotile").style.width = "80px";
 //document.getElementById("x_Normal").style.width = "80px";
 //document.getElementById("x_Abnormal").style.width = "80px";
 //document.getElementById("x_Headdefects").style.width = "80px";
 // document.getElementById("x_MidpieceDefects").style.width = "80px";
 //document.getElementById("x_TailDefects").style.width = "80px";
 //document.getElementById("x_NormalProgMotile").style.width = "80px";
 //document.getElementById("x_Volume1").style.width = "80px";
 //document.getElementById("x_Concentration1").style.width = "80px";
 //document.getElementById("x_Total1").style.width = "80px";
 //document.getElementById("x_ProgressiveMotility1").style.width = "80px";
 //document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
 //document.getElementById("x_Immotile1").style.width = "80px";
 //document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
 //document.getElementById("x_Volume2").style.width = "80px";
 //document.getElementById("x_Concentration2").style.width = "80px";
 //document.getElementById("x_Total2").style.width = "80px";
 //document.getElementById("x_ProgressiveMotility2").style.width = "80px";
 //document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
 //document.getElementById("x_Immotile2").style.width = "80px";
 //document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";

 					 document.getElementById("idMacs").style.visibility = "hidden";
	var e = document.getElementById("x_RequestSample");

//	var RequestSample = e.options[e.selectedIndex].value;
	var TankLocation = document.getElementById("TankLocation");
	var RequestSample = document.getElementById('el_view_semenanalysis_RequestSample').innerText;
	document.getElementById('SemenHeading').innerText = 'Spermiogram';
				if(RequestSample == "Freezing")
				{
				document.getElementById("idMacs").style.display = "none";
					document.getElementById('SemenHeading').innerText = 'Semen Freezing';
					TankLocation.style.visibility = "hidden";
				}else{
					TankLocation.style.visibility = "hidden";
				}
				var capacitationTable = document.getElementById("capacitationTable");
				if(RequestSample == "IUI processing")
				{
				document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
					capacitationTable.style.width = "100%";
					 document.getElementById("Volume1").style.visibility = "visible";
					 document.getElementById("Concentration1").style.visibility = "visible";
					 document.getElementById("Total1").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("Immotile1").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("capacitationTableHead").style.visibility = "visible";
					 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
					document.getElementById("PostCapacitation").innerText = "Post Capacitation";
					document.getElementById("Big").style.visibility = "hidden";
					document.getElementById("Medium").style.visibility = "hidden";
					document.getElementById("Small").style.visibility = "hidden";
					document.getElementById("NoHalo").style.visibility = "hidden";
					document.getElementById("Fragmented").style.visibility = "hidden";
					document.getElementById("NonFragmented").style.visibility = "hidden";
					document.getElementById("DFI").style.visibility = "hidden";
					document.getElementById("Fragmented").style.display = "none";
					document.getElementById("NonFragmented").style.display = "none";
					document.getElementById("DFI").style.display = "none";
 document.getElementById("IsueBy").style.visibility = "hidden";
document.getElementById("MaxCapacitation").style.visibility = "hidden";
						 document.getElementById("MaxCapacitation").style.width = "0px";
						var MACS = document.getElementById('el_view_semenanalysis_MACS').innerText;
				if(MACS == "MACS")
				{
				  					 					 document.getElementById("Volume2").style.visibility = "visible";
					 document.getElementById("Concentration2").style.visibility = "visible";
					 document.getElementById("Total2").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
					 document.getElementById("Immotile2").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
document.getElementById("MaxCapacitation").style.visibility = "visible";

					//document.getElementById("x_Volume2").style.width = "80px";
 				//	document.getElementById("x_Concentration2").style.width = "80px";
 				//	document.getElementById("x_Total2").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility2").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
 				//	document.getElementById("x_Immotile2").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";

				}else{

				//	 document.getElementById("x_Volume2").style.width = "0px";
				//	 document.getElementById("x_Concentration2").style.width = "0px";
				//	 document.getElementById("x_Total2").style.width = "0px";
				//	 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
				//	 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
				//	 document.getElementById("x_Immotile2").style.width = "0px";
				//	 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
										 document.getElementById("Volume2").style.display = "none";
					document.getElementById("Concentration2").style.display = "none";
					document.getElementById("Total2").style.display = "none";
					document.getElementById("ProgressiveMotility2").style.display = "none";
					document.getElementById("NonProgrssiveMotile2").style.display = "hidnoneden";
					document.getElementById("Immotile2").style.display = "none";
					document.getElementById("TotalProgrssiveMotile2").style.display = "none";
					 document.getElementById("idMacs").style.display = "none";
				}

					//document.getElementById("x_Volume1").style.width = "80px";
 				//	document.getElementById("x_Concentration1").style.width = "80px";
 				//	document.getElementById("x_Total1").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility1").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
 				//	document.getElementById("x_Immotile1").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";

				}else{
					capacitationTable.style.width = "60%";
					 document.getElementById("Volume1").style.visibility = "hidden";
					 document.getElementById("Concentration1").style.visibility = "hidden";
					 document.getElementById("Total1").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("Immotile1").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("capacitationTableHead").style.visibility = "hidden";
					 document.getElementById("PreCapacitation").innerText = "";
					 document.getElementById("PostCapacitation").innerText = "";

					 //document.getElementById("x_Volume1").style.width = "0px";
					 //document.getElementById("x_Concentration1").style.width = "0px";
					 //document.getElementById("x_Total1").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility1").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Immotile1").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Volume2").style.width = "0px";
					 //document.getElementById("x_Concentration2").style.width = "0px";
					 //document.getElementById("x_Total2").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility2").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
					 //document.getElementById("x_Immotile2").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";

					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Big").style.visibility = "hidden";
					 document.getElementById("Medium").style.visibility = "hidden";
					 document.getElementById("Small").style.visibility = "hidden";
					 document.getElementById("NoHalo").style.visibility = "hidden";
					 document.getElementById("Fragmented").style.visibility = "hidden";
					 document.getElementById("NonFragmented").style.visibility = "hidden";
					 document.getElementById("DFI").style.visibility = "hidden";
					 document.getElementById("InseminationTime").style.visibility = "hidden";
					 document.getElementById("InseminationBy").style.visibility = "hidden";
					 document.getElementById("IsueBy").style.visibility = "hidden";
					 document.getElementById("idMacs").style.display = "none";
	}
	if (RequestSample == "DFI") {
		document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
		document.getElementById("Big").style.visibility = "visible";
		document.getElementById("Medium").style.visibility = "visible";
		document.getElementById("Small").style.visibility = "visible";
		document.getElementById("NoHalo").style.visibility = "visible";
		document.getElementById("Fragmented").style.visibility = "visible";
		document.getElementById("NonFragmented").style.visibility = "visible";
		document.getElementById("DFI").style.visibility = "visible";
		document.getElementById("idMacs").style.display = "none";
	}
					var e = document.getElementById("x_SemenOrgin");

				//	var SemenOrgin = e.options[e.selectedIndex].value;
				var donorId = document.getElementById("donorId");
	var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
	var SemenOrgin = document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;
				if(SemenOrgin == "Donor")
				{
					donorId.style.visibility = "visible";
					DonorBloodGroupId.style.visibility = "visible";
				}else{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "hidden";
				}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_semenanalysis_view->terminate();
?>