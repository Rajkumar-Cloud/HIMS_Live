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
$ivf_oocytedenudation_view = new ivf_oocytedenudation_view();

// Run the page
$ivf_oocytedenudation_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_oocytedenudationview = currentForm = new ew.Form("fivf_oocytedenudationview", "view");

// Form_CustomValidate event
fivf_oocytedenudationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudationview.lists["x_patient2"] = <?php echo $ivf_oocytedenudation_view->patient2->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_patient2"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->patient2->lookupOptions()) ?>;
fivf_oocytedenudationview.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_view->OocyteOrgin->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->OocyteOrgin->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationview.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_view->patient1->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->patient1->lookupOptions()) ?>;
fivf_oocytedenudationview.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_view->OocyteType->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->OocyteType->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationview.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_view->patient3->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->patient3->lookupOptions()) ?>;
fivf_oocytedenudationview.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_view->patient4->Lookup->toClientList() ?>;
fivf_oocytedenudationview.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_view->patient4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_oocytedenudation_view->ExportOptions->render("body") ?>
<?php $ivf_oocytedenudation_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_oocytedenudation_view->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_view->showMessage();
?>
<form name="fivf_oocytedenudationview" id="fivf_oocytedenudationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_id"><script id="tpc_ivf_oocytedenudation_id" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_id" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RIDNo"><script id="tpc_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span></script></span></td>
		<td data-name="RIDNo"<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Name"><script id="tpc_ivf_oocytedenudation_Name" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Name" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
	<tr id="r_ResultDate">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ResultDate"><script id="tpc_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span></script></span></td>
		<td data-name="ResultDate"<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
	<tr id="r_Surgeon">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Surgeon"><script id="tpc_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></span></script></span></td>
		<td data-name="Surgeon"<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<tr id="r_AsstSurgeon">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon"><script id="tpc_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></span></script></span></td>
		<td data-name="AsstSurgeon"<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
	<tr id="r_Anaesthetist">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist"><script id="tpc_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></span></script></span></td>
		<td data-name="Anaesthetist"<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<tr id="r_AnaestheiaType">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType"><script id="tpc_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></span></script></span></td>
		<td data-name="AnaestheiaType"<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<tr id="r_PrimaryEmbryologist">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist"><script id="tpc_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></span></script></span></td>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<tr id="r_SecondaryEmbryologist">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist"><script id="tpc_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></span></script></span></td>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OPUNotes->Visible) { // OPUNotes ?>
	<tr id="r_OPUNotes">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OPUNotes"><script id="tpc_ivf_oocytedenudation_OPUNotes" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OPUNotes->caption() ?></span></script></span></td>
		<td data-name="OPUNotes"<?php echo $ivf_oocytedenudation->OPUNotes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OPUNotes" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OPUNotes">
<span<?php echo $ivf_oocytedenudation->OPUNotes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OPUNotes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<tr id="r_NoOfFolliclesRight">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></span></script></span></td>
		<td data-name="NoOfFolliclesRight"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<tr id="r_NoOfFolliclesLeft">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></span></script></span></td>
		<td data-name="NoOfFolliclesLeft"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<tr id="r_NoOfOocytes">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes"><script id="tpc_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></span></script></span></td>
		<td data-name="NoOfOocytes"<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<tr id="r_RecordOocyteDenudation">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation"><script id="tpc_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></span></script></span></td>
		<td data-name="RecordOocyteDenudation"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<tr id="r_DateOfDenudation">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation"><script id="tpc_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span></script></span></td>
		<td data-name="DateOfDenudation"<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<tr id="r_DenudationDoneBy">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy"><script id="tpc_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></span></script></span></td>
		<td data-name="DenudationDoneBy"<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_status"><script id="tpc_ivf_oocytedenudation_status" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_status" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createdby"><script id="tpc_ivf_oocytedenudation_createdby" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_createdby" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createddatetime"><script id="tpc_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifiedby"><script id="tpc_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime"><script id="tpc_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_TidNo"><script id="tpc_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
	<tr id="r_ExpFollicles">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles"><script id="tpc_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></span></script></span></td>
		<td data-name="ExpFollicles"<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<tr id="r_SecondaryDenudationDoneBy">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy"><script id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></span></script></span></td>
		<td data-name="SecondaryDenudationDoneBy"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient2->Visible) { // patient2 ?>
	<tr id="r_patient2">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient2"><script id="tpc_ivf_oocytedenudation_patient2" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->patient2->caption() ?></span></script></span></td>
		<td data-name="patient2"<?php echo $ivf_oocytedenudation->patient2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient2" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_patient2">
<span<?php echo $ivf_oocytedenudation->patient2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate1->Visible) { // OocytesDonate1 ?>
	<tr id="r_OocytesDonate1">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate1"><script id="tpc_ivf_oocytedenudation_OocytesDonate1" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate1->caption() ?></span></script></span></td>
		<td data-name="OocytesDonate1"<?php echo $ivf_oocytedenudation->OocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate1" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate1">
<span<?php echo $ivf_oocytedenudation->OocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate2->Visible) { // OocytesDonate2 ?>
	<tr id="r_OocytesDonate2">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate2"><script id="tpc_ivf_oocytedenudation_OocytesDonate2" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate2->caption() ?></span></script></span></td>
		<td data-name="OocytesDonate2"<?php echo $ivf_oocytedenudation->OocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate2" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate2">
<span<?php echo $ivf_oocytedenudation->OocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ETDonate->Visible) { // ETDonate ?>
	<tr id="r_ETDonate">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ETDonate"><script id="tpc_ivf_oocytedenudation_ETDonate" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->ETDonate->caption() ?></span></script></span></td>
		<td data-name="ETDonate"<?php echo $ivf_oocytedenudation->ETDonate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ETDonate" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_ETDonate">
<span<?php echo $ivf_oocytedenudation->ETDonate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ETDonate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<tr id="r_OocyteOrgin">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin"><script id="tpc_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span></script></span></td>
		<td data-name="OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
	<tr id="r_patient1">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient1"><script id="tpc_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->patient1->caption() ?></span></script></span></td>
		<td data-name="patient1"<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
	<tr id="r_OocyteType">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteType"><script id="tpc_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span></script></span></td>
		<td data-name="OocyteType"<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<tr id="r_MIOocytesDonate1">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></span></script></span></td>
		<td data-name="MIOocytesDonate1"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<tr id="r_MIOocytesDonate2">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></span></script></span></td>
		<td data-name="MIOocytesDonate2"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
	<tr id="r_SelfMI">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMI"><script id="tpc_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></span></script></span></td>
		<td data-name="SelfMI"<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
	<tr id="r_SelfMII">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMII"><script id="tpc_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></span></script></span></td>
		<td data-name="SelfMII"<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
	<tr id="r_patient3">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient3"><script id="tpc_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->patient3->caption() ?></span></script></span></td>
		<td data-name="patient3"<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
	<tr id="r_patient4">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient4"><script id="tpc_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->patient4->caption() ?></span></script></span></td>
		<td data-name="patient4"<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<tr id="r_OocytesDonate3">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3"><script id="tpc_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></span></script></span></td>
		<td data-name="OocytesDonate3"<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<tr id="r_OocytesDonate4">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4"><script id="tpc_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></span></script></span></td>
		<td data-name="OocytesDonate4"<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<tr id="r_MIOocytesDonate3">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></span></script></span></td>
		<td data-name="MIOocytesDonate3"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<tr id="r_MIOocytesDonate4">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></span></script></span></td>
		<td data-name="MIOocytesDonate4"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<tr id="r_SelfOocytesMI">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI"><script id="tpc_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></span></script></span></td>
		<td data-name="SelfOocytesMI"<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<tr id="r_SelfOocytesMII">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII"><script id="tpc_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></span></script></span></td>
		<td data-name="SelfOocytesMII"<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
	<tr id="r_donor">
		<td class="<?php echo $ivf_oocytedenudation_view->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_donor"><script id="tpc_ivf_oocytedenudation_donor" class="ivf_oocytedenudationview" type="text/html"><span><?php echo $ivf_oocytedenudation->donor->caption() ?></span></script></span></td>
		<td data-name="donor"<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_donor" class="ivf_oocytedenudationview" type="text/html">
<span id="el_ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_oocytedenudationview" class="ew-custom-template"></div>
<script id="tpm_ivf_oocytedenudationview" type="text/html">
<div id="ct_ivf_oocytedenudation_view"><style>
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
$dbhelper = &DbHelper();
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
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
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
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
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ResultDate"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_ResultDate"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Surgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Surgeon"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_AsstSurgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AsstSurgeon"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Anaesthetist"/}}</span>
						</td>
						<td style="width:50%">
						{{include tmpl="#tpc_ivf_oocytedenudation_AnaestheiaType"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AnaestheiaType"/}}
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_PrimaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_PrimaryEmbryologist"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SecondaryEmbryologist"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OPUNotes"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OPUNotes"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ExpFollicles"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_ExpFollicles"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesRight"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesRight"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesLeft"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesLeft"/}}</span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfOocytes"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfOocytes"/}}</span>
						</td>
						<td>
						</td>
												<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DateOfDenudation"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DateOfDenudation"/}}</span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DenudationDoneBy"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DenudationDoneBy"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<div class="row" id="SelfOocyteShow">
<div class="row">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Self Oocyte  </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMI"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SelfOocytesMI"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMII"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SelfOocytesMII"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
</div>
<div class="row" id="OocyteDonateToPatientShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 1 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient1"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate1"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate1"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 2 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient2"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate2"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate2"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>				
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 3 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient3"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate3"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate3"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 4 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient4"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate4"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate4"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">  
			</br>
				<div id="addElement"></div>
			</br>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT count(Day0OocyteStage) as CountMIIStage FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."'  and Day0OocyteStage='MII';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["CountMIIStage"];
	$rs->MoveNext();
}
echo 'Total Number of MII = ' .$Services;
?>	
							</span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
	<font size="4" >
<table class="table table-striped ew-table ew-export-table" style="width:40%;">
<tr>
<td><b>Oocyte No</b></td>
<td><b>Stage</b></td>
<td><b>Remarks</b></td>
</tr>
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Day0sino"];
				$ItemCode =  $row["Day0OocyteStage"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["Remarks"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
echo $hhh;
?>		
</table> 
<br><br>
	  </font>
</div>
</script>
<?php
	if (in_array("ivf_embryology_chart", explode(",", $ivf_oocytedenudation->getCurrentDetailTable())) && $ivf_embryology_chart->DetailView) {
?>
<?php if ($ivf_oocytedenudation->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_embryology_chartgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_oocytedenudation->Rows) ?> };
ew.applyTemplate("tpd_ivf_oocytedenudationview", "tpm_ivf_oocytedenudationview", "ivf_oocytedenudationview", "<?php echo $ivf_oocytedenudation->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_oocytedenudationview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_oocytedenudation_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_view->terminate();
?>