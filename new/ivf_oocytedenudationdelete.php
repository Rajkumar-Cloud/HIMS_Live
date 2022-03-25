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
$ivf_oocytedenudation_delete = new ivf_oocytedenudation_delete();

// Run the page
$ivf_oocytedenudation_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_oocytedenudationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_oocytedenudationdelete = currentForm = new ew.Form("fivf_oocytedenudationdelete", "delete");
	loadjs.done("fivf_oocytedenudationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_oocytedenudation_delete->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_delete->showMessage();
?>
<form name="fivf_oocytedenudationdelete" id="fivf_oocytedenudationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_oocytedenudation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_oocytedenudation_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->id->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><?php echo $ivf_oocytedenudation_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><?php echo $ivf_oocytedenudation_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->Name->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><?php echo $ivf_oocytedenudation_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->ResultDate->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><?php echo $ivf_oocytedenudation_delete->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->Surgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><?php echo $ivf_oocytedenudation_delete->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->AsstSurgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><?php echo $ivf_oocytedenudation_delete->AsstSurgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Anaesthetist->Visible) { // Anaesthetist ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->Anaesthetist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><?php echo $ivf_oocytedenudation_delete->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->AnaestheiaType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><?php echo $ivf_oocytedenudation_delete->AnaestheiaType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><?php echo $ivf_oocytedenudation_delete->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><?php echo $ivf_oocytedenudation_delete->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->NoOfFolliclesRight->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><?php echo $ivf_oocytedenudation_delete->NoOfFolliclesRight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->NoOfFolliclesLeft->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><?php echo $ivf_oocytedenudation_delete->NoOfFolliclesLeft->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->NoOfOocytes->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><?php echo $ivf_oocytedenudation_delete->NoOfOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->RecordOocyteDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><?php echo $ivf_oocytedenudation_delete->RecordOocyteDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->DateOfDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><?php echo $ivf_oocytedenudation_delete->DateOfDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->DenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><?php echo $ivf_oocytedenudation_delete->DenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->status->Visible) { // status ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->status->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><?php echo $ivf_oocytedenudation_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->createdby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><?php echo $ivf_oocytedenudation_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->createddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><?php echo $ivf_oocytedenudation_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->modifiedby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><?php echo $ivf_oocytedenudation_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><?php echo $ivf_oocytedenudation_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><?php echo $ivf_oocytedenudation_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->ExpFollicles->Visible) { // ExpFollicles ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->ExpFollicles->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><?php echo $ivf_oocytedenudation_delete->ExpFollicles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><?php echo $ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->OocyteOrgin->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><?php echo $ivf_oocytedenudation_delete->OocyteOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient1->Visible) { // patient1 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->patient1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><?php echo $ivf_oocytedenudation_delete->patient1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocyteType->Visible) { // OocyteType ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->OocyteType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><?php echo $ivf_oocytedenudation_delete->OocyteType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate2->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfMI->Visible) { // SelfMI ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SelfMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><?php echo $ivf_oocytedenudation_delete->SelfMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfMII->Visible) { // SelfMII ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SelfMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><?php echo $ivf_oocytedenudation_delete->SelfMII->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient3->Visible) { // patient3 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->patient3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><?php echo $ivf_oocytedenudation_delete->patient3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient4->Visible) { // patient4 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->patient4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><?php echo $ivf_oocytedenudation_delete->patient4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->OocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><?php echo $ivf_oocytedenudation_delete->OocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->OocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><?php echo $ivf_oocytedenudation_delete->OocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SelfOocytesMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><?php echo $ivf_oocytedenudation_delete->SelfOocytesMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<th class="<?php echo $ivf_oocytedenudation_delete->SelfOocytesMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><?php echo $ivf_oocytedenudation_delete->SelfOocytesMII->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_oocytedenudation_delete->RecordCount = 0;
$i = 0;
while (!$ivf_oocytedenudation_delete->Recordset->EOF) {
	$ivf_oocytedenudation_delete->RecordCount++;
	$ivf_oocytedenudation_delete->RowCount++;

	// Set row properties
	$ivf_oocytedenudation->resetAttributes();
	$ivf_oocytedenudation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_oocytedenudation_delete->loadRowValues($ivf_oocytedenudation_delete->Recordset);

	// Render row
	$ivf_oocytedenudation_delete->renderRow();
?>
	<tr <?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php if ($ivf_oocytedenudation_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_oocytedenudation_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation_delete->id->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_oocytedenudation_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_oocytedenudation_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_delete->Name->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->ResultDate->Visible) { // ResultDate ?>
		<td <?php echo $ivf_oocytedenudation_delete->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation_delete->ResultDate->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Surgeon->Visible) { // Surgeon ?>
		<td <?php echo $ivf_oocytedenudation_delete->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation_delete->Surgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td <?php echo $ivf_oocytedenudation_delete->AsstSurgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation_delete->AsstSurgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->Anaesthetist->Visible) { // Anaesthetist ?>
		<td <?php echo $ivf_oocytedenudation_delete->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation_delete->Anaesthetist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td <?php echo $ivf_oocytedenudation_delete->AnaestheiaType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation_delete->AnaestheiaType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td <?php echo $ivf_oocytedenudation_delete->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_delete->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td <?php echo $ivf_oocytedenudation_delete->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_delete->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td <?php echo $ivf_oocytedenudation_delete->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation_delete->NoOfFolliclesRight->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td <?php echo $ivf_oocytedenudation_delete->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation_delete->NoOfFolliclesLeft->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td <?php echo $ivf_oocytedenudation_delete->NoOfOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation_delete->NoOfOocytes->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td <?php echo $ivf_oocytedenudation_delete->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation_delete->RecordOocyteDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td <?php echo $ivf_oocytedenudation_delete->DateOfDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation_delete->DateOfDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td <?php echo $ivf_oocytedenudation_delete->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_delete->DenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->status->Visible) { // status ?>
		<td <?php echo $ivf_oocytedenudation_delete->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation_delete->status->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $ivf_oocytedenudation_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation_delete->createdby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $ivf_oocytedenudation_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation_delete->createddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $ivf_oocytedenudation_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation_delete->modifiedby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $ivf_oocytedenudation_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_delete->modifieddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_oocytedenudation_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_delete->TidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->ExpFollicles->Visible) { // ExpFollicles ?>
		<td <?php echo $ivf_oocytedenudation_delete->ExpFollicles->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation_delete->ExpFollicles->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->ExpFollicles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td <?php echo $ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td <?php echo $ivf_oocytedenudation_delete->OocyteOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation_delete->OocyteOrgin->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient1->Visible) { // patient1 ?>
		<td <?php echo $ivf_oocytedenudation_delete->patient1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation_delete->patient1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->patient1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocyteType->Visible) { // OocyteType ?>
		<td <?php echo $ivf_oocytedenudation_delete->OocyteType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation_delete->OocyteType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->OocyteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td <?php echo $ivf_oocytedenudation_delete->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td <?php echo $ivf_oocytedenudation_delete->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate2->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfMI->Visible) { // SelfMI ?>
		<td <?php echo $ivf_oocytedenudation_delete->SelfMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation_delete->SelfMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SelfMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfMII->Visible) { // SelfMII ?>
		<td <?php echo $ivf_oocytedenudation_delete->SelfMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation_delete->SelfMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SelfMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient3->Visible) { // patient3 ?>
		<td <?php echo $ivf_oocytedenudation_delete->patient3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation_delete->patient3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->patient3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->patient4->Visible) { // patient4 ?>
		<td <?php echo $ivf_oocytedenudation_delete->patient4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation_delete->patient4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->patient4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td <?php echo $ivf_oocytedenudation_delete->OocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation_delete->OocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td <?php echo $ivf_oocytedenudation_delete->OocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation_delete->OocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td <?php echo $ivf_oocytedenudation_delete->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td <?php echo $ivf_oocytedenudation_delete->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation_delete->MIOocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td <?php echo $ivf_oocytedenudation_delete->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation_delete->SelfOocytesMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_delete->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td <?php echo $ivf_oocytedenudation_delete->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation_delete->SelfOocytesMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_delete->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_oocytedenudation_delete->Recordset->moveNext();
}
$ivf_oocytedenudation_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_oocytedenudation_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_oocytedenudation_delete->terminate();
?>